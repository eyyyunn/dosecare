<div class="sidebar">
    <h2>Admin Panel</h2>
    <ul>
        <li><a href="dashboard.php">Dashboard</a></li>
        <li><a href="users.php">Users Table</a></li>
        <li><a href="health.php">Health Data</a></li>
        <li><a href="charts.php">Charts & Analytics</a></li>
        <li><a href="logout.php">Logout</a></li>
    </ul>
</div>

<style>
    .sidebar {
        width: 250px;
        height: 100vh;
        background: #333;
        color: white;
        position: fixed;
        padding-top: 20px;
    }
    .sidebar h2 {
        text-align: center;
        margin-bottom: 20px;
    }
    .sidebar ul {
        list-style: none;
        padding: 0;
    }
    .sidebar ul li {
        padding: 15px;
        text-align: center;
        border-bottom: 1px solid #444;
    }
    .sidebar ul li a {
        color: white;
        text-decoration: none;
        display: block;
    }
    .sidebar ul li:hover {
        background: #555;
    }
</style>
