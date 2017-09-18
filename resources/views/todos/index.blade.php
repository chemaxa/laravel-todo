@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">

                    <div class="panel-body">
                        <!-- Display Validation Errors -->
                        @include('common.errors')

                        <h1>Please define task title and description!</h1>
                        <!-- New Task Form -->
                        <form action="{{ url('todo') }}" method="POST" class="form-horizontal">
                        {{ csrf_field() }}

                        <!-- Task Name -->
                            <div class="form-group">
                                <label for="task-name" class="col-sm-3 control-label">Title</label>

                                <div class="col-sm-6">
                                    <input type="text" name="title" id="task-name" class="form-control">
                                </div>
                            </div>

                            <!-- Task Body -->
                            <div class="form-group">
                                <label for="task-body" class="col-sm-3 control-label">Description</label>

                                <div class="col-sm-6">
                                    <textarea name="body" id="task-body" class="form-control"></textarea>
                                </div>
                            </div>

                            <!-- Add Task Button -->
                            <div class="form-group">
                                <div class="col-sm-offset-3 col-sm-6">
                                    <button type="submit" class="btn btn-default">
                                        <i class="fa fa-plus"></i> Add Task
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
