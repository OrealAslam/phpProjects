public function fixedHourInvoice(Request $request)
    {
        $request->validate([
            'hours' => 'required|numeric',
            'projectId' => 'required|numeric',
        ]);

        $projectID = $request->projectId;
        $project = Project::find($projectID);
        $tasks = $project->task;
        // update paid / unpaid hours fields
        $taskHours = $this->projectController->eachTaskHour($tasks);
        // dd($taskHours);

        $data = $this->calculateInvoiceTime($taskHours, $request->hours);
        // dd($data);
        foreach ($tasks as $index => $value) {
            $paidLogs = Carbon::parse($value->paidLogs)->format('H:i');
            $totalHours = Carbon::parse($value->totalHours)->format('H:i');

            // update database fields (paid/unpaid hours)
            $paidLogs = $this->projectController->timeDifference($totalHours, $data[$index]);
            // dd($paidLogs);
            $unPaidLogs = $this->projectController->timeDifference($paidLogs, $value->totalHours);
            Task::where('id', $value->id)->update(['paidLogs' => $paidLogs, 'unPaidLogs' => $unPaidLogs]);
        }
        return redirect()->route('view.project', ['id' => $projectID]);
    }


    public function calculateInvoiceTime($times, $subtract)
    {

        $times = ["12:10", "04:16", "02:05"];
        $new_times = array_map(
            fn ($t) => Carbon::createFromFormat('H:i', $t)
                ->subHours($subtract)
                ->format('H:i'),
            $times
        );
        dd($new_times);
        return $new_times;
    }