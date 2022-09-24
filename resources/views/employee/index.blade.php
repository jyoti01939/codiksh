@extends('employee.layout')



@section('content')

    <div class="row">

        <div class="col-lg-12 margin-tb">

            <div class="pull-left">

                <h2>Employee Details</h2>

            </div>

            <div class="pull-right">

                <a class="btn btn-success" href="{{ route('employee.create') }}"> Create New Employee</a>

            </div>

        </div>

    </div>



    @if ($message = Session::get('success'))

        <div class="alert alert-success">

            <p>{{ $message }}</p>

        </div>

    @endif

    @if ($message = Session::get('delete'))

        <div class="alert alert-danger">

            <p>{{ $message }}</p>

        </div>

    @endif


    <table class="table table-bordered">

        <tr>

            <th>No</th>

            <th>Name</th>

            <th>Employee Id</th>
            <th>Experience</th>
            <th>Mobile</th>
            <th>Status</th>

            <th width="280px">Action</th>

        </tr>

        @foreach ($employeeDtls as $employee)
        @if($employee->status == 1 || $employee->expreience == 5)
        <tr class="table-success">

            <td>{{ ++$i }}</td>

            <td>{{ $employee->name }}</td>

            <td>{{ $employee->employee_id }}</td>
            <td>{{ $employee->expreience }}</td>
            <td>{{ $employee->mobile }}</td>
            @if($employee->status == 0)
            <td style="color: rgb(211, 51, 51)">{{"INACTIVE" }}</td>
            @else <td style="color: rgb(128, 206, 128)">{{ "ACTIVE" }}</td>
            @endif


            <td>
                    <a class="btn btn-primary btn-sm" href="{{ url('edit',$employee->id) }}">Edit</a>
                    <a class="btn btn-danger btn-sm" href="{{ url('delete',$employee->id) }}">Delete</a>
            </td>

        </tr>
        @else
        <tr>
            <td>{{ ++$i }}</td>

            <td>{{ $employee->name }}</td>

            <td>{{ $employee->employee_id }}</td>
            <td>{{ $employee->expreience }}</td>
            <td>{{ $employee->mobile }}</td>
            @if($employee->status == 0)
            <td style="color: rgb(211, 51, 51)">{{"INACTIVE" }}</td>
            @else <td style="color: rgb(128, 206, 128)">{{ "ACTIVE" }}</td>
            @endif


            <td>
                    <a class="btn btn-primary btn-sm" href="{{ url('edit',$employee->id) }}">Edit</a>

                    <a class="btn btn-danger btn-sm" href="{{ url('delete',$employee->id) }}">Delete</a>
            </td>

        </tr>
        @endif
        @endforeach

    </table>



    {!! $employeeDtls->links() !!}



@endsection
