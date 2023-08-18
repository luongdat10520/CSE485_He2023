<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Channels</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" >
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
</head>
<body>
<div class="container">
    <header>
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
                <a class="navbar-brand text-primary" href="/channels">LIST OF CHANNELS</a>
                <div class="text-end">
                    <a href="/channels/create">
                        <button type="submit" name="add" class="btn btn-success">
                        <i class="bi bi-plus-lg"></i>
                        Add New Channel</button>
                    </a>               
                </div>        
            </div>
        </nav>
    </header>
    <main>
        <div>
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
        </div>
        <table class="table table-bordered">
            <thead>
            <tr>
                <th scope="col" class="text-center">Channel_ID</th>
                <th scope="col" class="text-center">Channel_Name</th>
                <th scope="col" class="text-center">Description</th>
                <th scope="col" class="text-center">Subscribers_Count</th>
                <th scope="col" class="text-center">URL</th>
                <th scope="col" colspan="3" class="text-center">Action</th>

            </tr>
            </thead>
            <tbody>           
            @foreach($channels as $channel)             
                <tr>
                    <th scope="row" class="text-center">{{$channel->ChannelID}}</th>
                    <td class="text-center">{{$channel->ChannelName}}</td>
                    <td class="text-center">{{$channel->Description}}</td>
                    <td class="text-center">{{$channel->SubscribersCount}}</td>
                    <td class="text-center">{{$channel->URL}}</td>
                    <td class="text-center">
                    <a class="btn btn-primary" href="{{ route('channels.show',$channel->ChannelID) }}" class="">Detail</a>
                    <a class="btn btn-primary" href="{{ route('channels.edit',$channel->ChannelID) }}">Edit</a>
                    <a class="btn btn-primary" href="#" data-toggle="modal" data-target="#{{$channel->ChannelID}}">Delete</a>
                    <!-- Modal -->
                    <form action="{{ route('channels.destroy',$channel->ChannelID) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <div class="modal fade" id="{{$channel->ChannelID}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Delete Channel</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        Are you sure delete the channel with ID: {{$channel->ChannelID}} ?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                    </td>
                </tr>
            @endforeach   
            </tbody>
        </table>
    </main>
</div>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</html>