<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Channels</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
</head>
<body>
<div class="container">
    <header>
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
                <a class="navbar-brand text-primary" href="/channels">LIST OF CHANNELS</a>
            </div>
        </nav>
    </header>
    <main>
        <div>
            <a href="/channels">
                <button type="submit" name="edit" class="btn btn-success mt-3">Go Back</button>
            </a>               
        </div> 
        <h3 class="text-center text-success text-bold fs-3 text-uppercase mt-3 mb-3">Add New Channel</h3>
        <div>
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
        </div>
        <form method="POST" action="{{ route('channels.store') }}">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Channel Name:</label>
                <input type="text" class="form-control" name="ChannelName" value="">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Description:</label>
                <input type="text" class="form-control" name="Description" value="">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Subscribers Count:</label>
                <input type="text" class="form-control" name="SubscribersCount" value="">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">URL:</label>
                <input type="text" class="form-control" name="URL" value="">
            </div>
            <div>
                <a href="#">
                    <button type="submit" name="add" class="btn btn-primary">Add</button>
                </a>               
            </div> 
        </form>
    </main>
</div>
</body>
</html>