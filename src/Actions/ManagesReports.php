<?php

namespace Devlau\Runrunit\Actions;

use Devlau\Runrunit\Resources\Report;
use Devlau\Runrunit\Resources\ReportCapacity;
use Devlau\Runrunit\Resources\ReportMeta;
use Devlau\Runrunit\Resources\ReportOthers;
use Devlau\Runrunit\Resources\ReportResult;
use Devlau\Runrunit\Resources\ReportUntracked;

trait ManagesReports
{
    /**
     * Get all time worked reports.
     *
     * @see https://runrun.it/api/documentation#time-worked
     *
     * @return array
     */
    public function reportTimeWorked(array $query = null)
    {
        $report = $this->get('reports/time_worked', ['query' => $query]);

        $response = [];

        if (isset($report['meta'])) {
            $response['meta'] = new ReportMeta($report['meta']);
        }

        if (isset($report['result'])) {
            $response['result'] = $this->transformCollection(
                $report['result'],
                ReportResult::class
            );
        }

        if (isset($report['others'])) {
            $response['others'] = $this->transformCollection(
                $report['others'],
                ReportOthers::class
            );
        }

        if (isset($report['capacity'])) {
            $response['capacity'] = $this->transformCollection(
                $report['capacity'],
                ReportCapacity::class
            );
        }

        if (isset($report['untracked'])) {
            $response['untracked'] = $this->transformCollection(
                $report['untracked'],
                ReportUntracked::class
            );
        }

        return $response;
    }
}
