package org.example.logger.exporter;

import java.util.List;

public class CompositeExporter implements Exporter {
    private List<Exporter> exporters;

    public CompositeExporter(Exporter... exporters) {
        this.exporters = List.of(exporters);
    }


    @Override
    public void output(String message) {
        for (Exporter exporter : exporters) {
            exporter.output(message);
        }
    }
}
