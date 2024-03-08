<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Provider</title>
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
    <div class="container mx-auto mt-10 p-4s border border-gray-300 rounded-lg">
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
        <form action="{{ route('providers.update', $provider->id) }}" method="POST"
            class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label for="sim_name" class="block text-gray-700 font-bold mb-2">Network Provider</label>
                <input type="text" id="sim_name" name="sim_name" value="{{ $provider->sim_name }}"
                    class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>
            <button type="submit"
                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" style="background-color: #7ed7d2;">Update</button>
        </form>
    </div>
</body>

</html>
