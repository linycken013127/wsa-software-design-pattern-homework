<?php
namespace Tests\Feature;

use PHPUnit\Framework\TestCase;

class MainTest extends TestCase
{
    public static function inputOutputProvider()
    {
        return [
            [
                __DIR__ . '/../../testcases/normal.chit-chat.in',
                __DIR__ . '/../../testcases/normal.chit-chat.out',
            ],
        ];
    }
    /**
     * @dataProvider inputOutputProvider
     */
    public function test_can_do($inputFile, $expectedOutputFile)
    {
        // Given input file
        $input_lines = file($inputFile, FILE_IGNORE_NEW_LINES);
        $expected_output_lines = file($expectedOutputFile, FILE_IGNORE_NEW_LINES);

        $descriptorspec = [
            0 => ["pipe", "r"], // stdin is a pipe that the child will read from
            1 => ["pipe", "w"], // stdout is a pipe that the child will write to
            2 => ["pipe", "w"], // stderr is a pipe that the child will write to
        ];

        $process = proc_open('php ../../main.php', $descriptorspec, $pipes); // Run main.php

        if (is_resource($process)) { // If main.php is running
            foreach ($input_lines as $input) { // Send input to main.php
                fwrite($pipes[0], $input . "\n");
            }
            fclose($pipes[0]);

            $output = stream_get_contents($pipes[1]);
            $output_lines = explode("\n", trim($output));

            fclose($pipes[1]);
            fclose($pipes[2]);

            $return_value = proc_close($process);
            foreach ($output_lines as $i => $output_line) {
                $lineNumber = $i + 1;
                printf("[{$lineNumber}]: {$output_line}\n");
                $this->assertEquals($expected_output_lines[$i], $output_line);
            }
        }
    }
}