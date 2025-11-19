<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Pending Vehicle Approvals - GoodsMover</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            margin: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: url('https://images.unsplash.com/photo-1607011222719-9f9fc981b1ee') no-repeat center center fixed;
            background-size: cover;
            color: white;
        }

        .overlay {
            background-color: rgba(0,0,0,0.7);
            width: 100%;
            min-height: 100vh;
            padding: 40px;
        }

        .container {
            background: rgba(255,255,255,0.1);
            padding: 30px;
            border-radius: 15px;
            max-width: 1200px;
            margin: auto;
            box-shadow: 0 0 15px rgba(0,0,0,0.5);
        }

        h2 {
            text-align: center;
            margin-bottom: 30px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            color: white;
        }

        th, td {
            padding: 12px;
            border-bottom: 1px solid #ccc;
            text-align: center;
        }

        th {
            background-color: #f7931e;
        }

        img {
            max-width: 100px;
        }

        button {
            padding: 6px 12px;
            border: none;
            cursor: pointer;
            border-radius: 5px;
        }

        .approve-btn {
            background-color: green;
            color: white;
        }

        .reject-btn {
            background-color: red;
            color: white;
        }

        .back-btn {
            display: inline-block;
            margin-top: 30px;
            padding: 10px 20px;
            background-color: #f7931e;
            color: white;
            text-decoration: none;
            border-radius: 8px;
        }

        .back-btn:hover {
            background-color: #ffa640;
        }
    </style>
</head>
<body>
<div class="overlay">
    <div class="container">
        <h2>Pending Vehicle Approvals</h2>

        @if($pendingVehicles->isEmpty())
            <p>No pending vehicles for approval.</p>
        @else
        <table>
    <thead>
    <tr>
        <th>Vehicle Image</th>
        <th>Smartcard Image</th>
        <th>Vehicle Type</th>
        <th>Vehicle Number</th>
        <th>Weight Capacity</th>
        <th>Can Carry</th>
        <th>Chassis Number</th>
        <th>Service Provider Name</th>
        <th>Service Provider Email</th>
        <th>Service Provider CNIC</th>
        <th>Action</th>
    </tr>
</thead>
<tbody>
@foreach($pendingVehicles as $vehicle)
    <tr>
        <td>
            @if($vehicle->vehicle_image)
                <img src="{{ asset('uploads/vehicles/' . $vehicle->vehicle_image) }}" alt="vehicle" style="max-width:120px;"/>
            @else
                N/A
            @endif
        </td>
        <td>
            @if($vehicle->smartcard_image)
                <img src="{{ asset('uploads/smartcards/' . $vehicle->smartcard_image) }}" alt="smartcard" style="max-width:120px;"/>
            @else
                N/A
            @endif
        </td>
        <td>{{ $vehicle->vehicle_type }}</td>
        <td>{{ $vehicle->vehicle_number }}</td>
        <td>{{ $vehicle->weight_capacity }}</td>
        <td>{{ $vehicle->can_carry }}</td>
        <td>{{ $vehicle->chassis_number }}</td>
        <td>{{ $vehicle->user->name }}</td>
        <td>{{ $vehicle->user->email }}</td>
        <td>{{ $vehicle->user->cnic }}</td>
        <td>
            <form action="{{ route('vehicle.approve', $vehicle->id) }}" method="POST" style="display:inline-block;">
                @csrf
                <button type="submit" class="approve-btn">Approve</button>
            </form>

            <form action="{{ route('vehicle.reject', $vehicle->id) }}" method="POST" style="display:inline-block;">
                @csrf
                <button type="submit" class="reject-btn" onclick="return confirm('Are you sure to reject this vehicle?')">Reject</button>
            </form>
        </td>
    </tr>
@endforeach
</tbody>

        </table>
        @endif

        <!-- Back to Dashboard button at bottom-left -->
        <div style="text-align: left;">
            <a href="{{ route('admin.login') }}" class="back-btn">← Back to Dashboard</a>
        </div>
    </div>
</div>
</body>
</html>
