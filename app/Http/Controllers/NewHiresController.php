<?php

namespace App\Http\Controllers;

use App\Location;
use App\NewHire;
use App\Position;
use App\Status;
use App\User;
use App\TaskGroup;
use App\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class NewHiresController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {

        $newhires = NewHire::orderBy('hire_date', 'asc')->paginate(5);
        $positions = Position::orderBy('title', 'asc')->get();
        $locations = Location::orderBy('site', 'asc')->get();
        $statuses = Status::orderBy('status', 'asc')->get();

        return view('newhire.index', compact('newhires', 'positions', 'locations', 'statuses'));
    }

    public function store(Request $request)
    {
        // Generate slug from name
        $name = $request->input('name');
        $slug = str_replace(' ', '-', strtolower($name));

        $request->merge(['slug' => $slug]);

        $this->validate($request, [
            'name' => 'required',
            'slug' => 'required|unique:new_hires',
            'position_id' => 'required|exists:positions,id',
            'status_id' => 'required|exists:statuses,id',
            'location_id' => 'required|exists:locations,id',
            'hire_date' => 'required'
        ]);

        $newhire = NewHire::create($request->all());}

        // Get the task group by the position_id
        // $task_group = TaskGroup::where('position_id', $request->input('position_id'))->first();
        //
        // // Find all task lists associated with the task group
        // $task_lists = $task_group->task_lists;
        //
        // // Put all task list id into an array
        // foreach ($task_lists as $task_list)
        // {
        //     $task_list_array[] = $task_list->id;
        // }
        //
        // // Get task names
        // foreach
        //
        // $tasks = Task::
        // dd($tasklists);
        //
        // foreach ($tasks as $task)
        // {
        //     // $active_task = [$task->name];
        //     // echo $active_task;
        //     echo $task->name;
        // }
        // die;
        // $pid = $request->input('position_id');
        // // $position = Position::where('id', $request->input('position_id'));
        // $position = Position::where('position_id', 1)->first();
        // dd($position);
        // echo $position->task_group;
        // die;

        // $tasks = Task::where('')
        // $flights = App\Flight::where('active', 1)
        //        ->orderBy('name', 'desc')
        //        ->take(10)
        //        ->get();

        // create tasks

        // This section is catered to sending appropriate emails.  Need to move to it's own
        // class to shrink down the controller.
        //
        // get email addresses
        // $users = User::whereNotNull('email')->get();
        // $emails = $users->pluck('email');

        // send announce email
        // foreach ($emails as $email) {
        //     Mail::queue('emails.announce', ['newhire' => $newhire], function ($message) use ($newhire, $email) {
        //     $message->from('tgay@snowlinehospice.org', 'Terry Gay');
        //     $message->to("$email");
        //     $message->subject("New Hire Announcement - $newhire->name");
        // });

        // }

        // send task email to charise or jennifer
        // if ($newhire->location->slug == 'diamond-springs') {
        //     Mail::queue('emails.phone', ['newhire' => $newhire], function ($message) use ($newhire) {
        //         $message->from('egnyte@snowlinehospice.org', 'Egnyte');
        //         $message->to('jcaputo@snowlinehospice.org');
        //         $message->subject("Your input is needed for task - Phone and Extension");
        //         $message->replyTo("aperio@snowlinehospice.org");
        //     });
        // } elseif ($newhire->location->slug == 'sacramento') {
        //     Mail::queue('emails.phone', ['newhire' => $newhire], function ($message) use ($newhire) {
        //         $message->from('egnyte@snowlinehospice.org', 'Egnyte');
        //         $message->to('cspencer@snowlinehospice.org');
        //         $message->subject("Your input is needed for task - Phone and Extension");
        //         $message->replyTo("aperio@snowlinehospice.org");
        //     });
        // }

        flash()->success("$newhire->name has been announced!");

        return back();
    }
}
