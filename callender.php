<?php
$hostname = "localhost";
$username = "root";
$password = "";
$dbname = "apcrm";
$output = "";
$conn = mysqli_connect($hostname, $username, $password, $dbname);
$sql = mysqli_query($conn, "SELECT * FROM clients WHERE payed = 'null' ORDER BY created_at DESC ");
$row = mysqli_fetch_assoc($sql);
$query2 = $conn->query("SELECT * FROM clients WHERE payed = 'null' ORDER BY day_of_job DESC");
if (mysqli_num_rows($sql) > 0) {
    $row2 = mysqli_fetch_assoc($sql);
    $created_at = date('d-m-Y', strtotime($row['created_at'] . ' + 1 days'));
}
?>
<table class="divide-y divide-gray-200 flex-wrap bg-white rounded-tl-2xl rounded-tr-2xl mb-20">
    <header class="bg-white shadow bg-gray-800">
        <div class="grid mx-auto py-4 px-3 gap-2 m-1">
            <h1 class="text-2xl font-bold text-white place-self-center uppercase">
                CLIENTS Callender
            </h1>
    </header>
    <thead class="bg-gray-800">
        <tr>
            <th scope="col" class="px-2 py-3 text-left text-xs text-white uppercase tracking-wider text-center border-l border-gray-200">
                date
            </th>
            <th scope="col" class="px-2 py-3 text-left text-xs text-white uppercase tracking-wider text-center border-l border-gray-200">
                time
            </th>
            <th scope="col" class="px-2 py-3 text-left text-xs text-white uppercase tracking-wider text-center border-l border-gray-200">
                description
            </th>
            <th scope="col" class="px-2 py-3 text-left text-xs text-white uppercase tracking-wider text-center border-l border-gray-200">
                status
            </th>
        </tr>
    </thead>
    <?php while ($row2 = $query2->fetch_array()) { ?>
        <tbody class="bg-white p-3 rounded_md m-2">
            <tr>
                <td class="px-4 py-4 whitespace-nowrap text-sm text-gray-500 text-center">
                    <?php echo $row2['day_of_job']; ?>
                </td>
                <td class="px-4 py-4 whitespace-nowrap text-sm text-gray-500 text-center">
                    <input type="time" />
                </td>
                <td class="px-4 py-4 whitespace-nowrap text-sm text-gray-500 text-center">
                    <textarea></textarea>
                </td>
                <td class="px-4 py-4 whitespace-nowrap text-sm text-gray-500 text-center">
                    <input type="radio" />
                </td>
            </tr>
        <?PHP } ?>
        </tbody>
</table>