<?php

namespace Dcat\Admin\Widgets\DataCard;

use Dcat\Admin\Widgets\Chart\PolarArea;

class PolarAreaChartCard extends DoughnutChartCard
{
    protected function setupChart()
    {
        $this->options['chart'] = $this->chart =
            PolarArea::make()
                ->responsive(false)
                ->height('85px')
                ->width('85px')
                ->setHtmlAttribute('width', '85px')
                ->setHtmlAttribute('height', '85px')
                ->disableLegend();
    }
}
