<!DOCTYPE html>
<html>

<head>
    <title>Subscribers</title>
    <!-- Include necessary CSS files -->
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

    <div class="container mt-5 mx-auto">
        <table id="myTable" class="w-full">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Network Provider</th>
                    <th>Mobile Number</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($subscribers as $subscriber)
                <tr>
                    <td>{{ $subscriber->id }}</td>
                    <td>{{ $subscriber->fname }}</td>
                    <td>{{ $subscriber->lname }}</td>
                    <td>{{ $subscriber->sim_name }}</td>
                    <td>{{ $subscriber->number }}</td>
                    <td>
                        <!-- Edit Button -->
                        <a href="{{ route('subscribers.edit', $subscriber->id) }}"
                            class="inline-block py-2 px-4 bg-blue-500 hover:bg-blue-700 text-white font-bold rounded" style="background-color: #7ed7d2;">Edit</a>

                        <!-- Delete Button -->
                        <form action="{{ route('subscribers.destroy', $subscriber->id) }}" method="POST"
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
    <sdiv id="myModal" class="modal hidden fixed inset-0 flex items-center justify-center bg-black bg-opacity-50">
    <div class="modal-content bg-white p-8 rounded-lg shadow-md w-1/3"> <!-- Adjusted width to 1/3 -->
        <span class="close absolute top-0 right-0 mt-4 mr-4 text-gray-600 cursor-pointer" onclick="closeModal()">&times;</span>
            <span class="close absolute top-0 right-0 mt-4 mr-4 text-gray-600 cursor-pointer"
                onclick="closeModal()">&times;</span>
            <form action="{{ route('subscribers.store') }}" method="POST">
                @csrf
                <label for="fname">First Name:</label><br>
                <input type="text" id="fname" name="fname"
                    class="w-full border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline mb-4"><br>
                <label for="lname">Last Name:</label><br>
                <input type="text" id="lname" name="lname"
                    class="w-full border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline mb-4"><br>
                <label for="sim_name">Network Provider:</label><br>
                <select id="sim_name" name="sim_name"
                    class="w-full border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline mb-4">
                    @foreach($simNames as $simName)
                    <option value="{{ $simName }}">{{ $simName }}</option>
                    @endforeach
                </select><br><br>
                <label for="number">Mobile Number:</label><br>
                <input type="number" id="number" name="number"
                    class="w-full border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline mb-4"><br>
                <input type="submit" value="Submit"
                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" style="background-color: #7ed7d2;">
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


