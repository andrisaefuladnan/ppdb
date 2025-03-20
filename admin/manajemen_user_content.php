<?php
include('../config.php');

$query = "SELECT * FROM admin_users";
$result = mysqli_query($conn, $query);
?>

<div class="container mt-5">
    <h2 class="text-center">Manajemen User</h2>
    <div class="form-group">
        <input type="text" class="form-control" id="searchInput" placeholder="Cari User...">
    </div>
    <table class="table table-bordered table-striped" id="userTable">
        <thead class="thead-dark">
            <tr>
                <th>ID</th>
                <th>Username</th>
                <th>Email</th>
                <th>Created At</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = mysqli_fetch_assoc($result)) : ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['username']; ?></td>
                    <td><?php echo $row['email']; ?></td>
                    <td><?php echo $row['created_at']; ?></td>
                    <td>
                        <a href="edit_user.php?id=<?php echo $row['id']; ?>" class="btn btn-warning">Edit</a>
                        <a href="delete_user.php?id=<?php echo $row['id']; ?>" class="btn btn-danger">Hapus</a>
                    </td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</div>

<script>
document.getElementById('searchInput').addEventListener('keyup', function() {
    let input = this.value.toLowerCase();
    let rows = document.querySelectorAll('#userTable tbody tr');

    rows.forEach(row => {
        let columns = row.getElementsByTagName('td');
        let match = false;

        for (let i = 0; i < columns.length - 1; i++) {
            if (columns[i].textContent.toLowerCase().includes(input)) {
                match = true;
                break;
            }
        }

        row.style.display = match ? '' : 'none';
    });
});
</script>