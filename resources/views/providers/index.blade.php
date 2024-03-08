<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Providers</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="//cdn.datatables.net/2.0.1/css/dataTables.dataTables.min.css" rel="stylesheet">
</head>

<body>

    <nav class=" py-4" style="background-color: #7ed7d2;">
        <div class="container mx-auto flex justify-between items-center">
            <a href="{{ route('subscribers.index') }}" class="text-white font-bold">Home</a>
            <div>
                <a href="#news" class="text-white mr-6" onclick="showModal()">Add New Subscriber</a>
                <a href="{{ route('subscribers.index') }}" class="text-white">View Subcriber</a>
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

    <div class="container mt-5 mx-auto">
        <table id="myTable" class="w-full">
            <thead>
                <tr>
                    <th class="px-4 py-2 text-left">ID</th>
                    <th class="px-4 py-2 text-left">Network Provider</th>
                    <th class="px-4 py-2 text-left">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($providers as $provider)
                <tr>
                    <td class="px-4 py-2 text-left">{{ $provider->id }}</td>
                    <td class="px-4 py-2 text-left">{{ $provider->sim_name }}</td>
                    <td class="px-4 py-2 text-left">
                        <!-- Edit Button -->
                        <a href="{{ route('providers.edit', $provider->id) }}"
                            class="inline-block py-2 px-4 bg-blue-500 hover:bg-blue-700 text-white font-bold rounded" style="background-color: #7ed7d2;">Edit</a>

                        <!-- Delete Button -->
                        <form action="{{ route('providers.destroy', $provider->id) }}" method="POST"
                            class="inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="inline-block py-2 px-4 bg-red-500 hover:bg-red-700 text-white font-bold rounded">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Modal -->
    <div id="myModal" class="modal hidden fixed inset-0 flex items-center justify-center bg-black bg-opacity-50">
    <div class="modal-content bg-white p-8 rounded-lg shadow-md w-1/3"> <!-- Adjusted width to 1/3 -->
        <span class="close absolute top-0 right-0 mt-4 mr-4 text-gray-600 cursor-pointer" onclick="closeModal()">&times;</span>
        <form action="{{ route('providers.store') }}" method="POST">
            @csrf
            <label for="sim_name" class="block mb-2">Network Provider:</label><br>
            <select id="sim_name" name="sim_name" class="w-full border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline mb-4">
                <option value="Smart">Smart</option>
                <option value="TnT">TnT</option>
                <option value="TM">TM</option>
                <option value="Globe">Globe</option>
                <option value="Dito">Dito</option>
            </select>
            <input type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded w-full cursor-pointer" style="background-color: #7ed7d2;" value="Submit">
        </form>
    </div>
</div>


    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="//cdn.datatables.net/2.0.1/js/dataTables.min.js"></script>
       <script>
        let table = new DataTable('#myTable');

        // Get the modal
        var modal = document.getElementById("myModal");

        // Get the <span> element that closes the modal
        var span = document.getElementsByClassName("close")[0];

        // When the user clicks on <span> (x), close the modal
        span.onclick = function () {
            modal.style.display = "none";
        }

        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function (event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }

        // Function to show modal
        function showModal() {
            modal.style.display = "block";
        }

        // Function to close modal
        function closeModal() {
            modal.style.display = "none";
        }
    </script>
</body>

</html>
