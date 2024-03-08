<!DOCTYPE html>
<html>
<head>
    <title>Edit Subscriber</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="//cdn.datatables.net/2.0.1/css/dataTables.dataTables.min.css" rel="stylesheet">
</head>

<body>

    <nav class="py-4" style="background-color: #7ed7d2;">
        <div class="container mx-auto flex justify-between items-center">
            <a href="{{ route('subscribers.index') }}" class="text-white font-bold">Home</a>
            <div>
                <a href="#news" class="text-white mr-6" onclick="showModal()">Add New Subscriber</a>
                <a href="{{ route('providers.index') }}" class="text-white">View Providers</a>
            </div>
        </div>
    </nav>
    <div class="container mx-auto mt-10 p-4 border border-gray-300 rounded-lg">
        <div id="current-time" class="text-2xl font-semibold"></div>
    </div>

<script>
    // Get the current time
    var currentTime = new Date();
    
    // Format the time as per your requirement
    var formattedTime = currentTime.getHours() + ":" + currentTime.getMinutes() + ":" + currentTime.getSeconds();
    
    // Display the time in the specified element
    document.getElementById("current-time").innerText = "Current Time: " + formattedTime;   
    // Get the current time
    var currentTime = new Date();
    
    // Format the time as per your requirement
    var formattedTime = currentTime.getHours() + ":" + currentTime.getMinutes() + ":" + currentTime.getSeconds();
    
    // Display the time in the specified element
    document.getElementById("current-time").innerText = "Current Time: " + formattedTime;
</script>

<div class="container mx-auto mt-10 px-4">
    <form action="{{ route('subscribers.update', $subscriber->id) }}" method="POST" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
        @csrf
        @method('PUT')
        <div class="mb-4">
            <label for="fname" class="block text-gray-700 font-bold mb-2">First Name</label>
            <input type="text" id="fname" name="fname" value="{{ $subscriber->fname }}" class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        </div>
        <div class="mb-4">
            <label for="lname" class="block text-gray-700 font-bold mb-2">Last Name</label>
            <input type="text" id="lname" name="lname" value="{{ $subscriber->lname }}" class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        </div>
        <div class="mb-4">
            <label for="sim_name" class="block text-gray-700 font-bold mb-2">SIM Name</label>
            <select id="sim_name" name="sim_name" class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                @foreach($simNames as $simName)
                    <option value="{{ $simName }}" {{ $subscriber->sim_name == $simName ? 'selected' : '' }}>{{ $simName }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-4">
            <label for="number" class="block text-gray-700 font-bold mb-2">Number</label>
            <input type="number" id="number" name="number" value="{{ $subscriber->number }}" class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        </div>
        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" style="background-color: #7ed7d2;">Update</button>
    </form>
</div>

</body>
</html>
