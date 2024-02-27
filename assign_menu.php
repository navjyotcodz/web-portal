<?php
error_reporting(0);
include("navbar.php");
include 'nav_config.php';

$m_mode = $_REQUEST['m_mode'];
$id = $_REQUEST['id'];
$user_id = $_REQUEST['user_id'];
$menu_id = $_REQUEST['menu_id'];

$sqlUserMenu = "SELECT menu_id FROM user_menu WHERE user_id = '$user_id'";
$resultUserMenu = mysqli_query($conn, $sqlUserMenu);
$userMenuAssociations = [];

while ($rowUserMenu = mysqli_fetch_assoc($resultUserMenu)) {
    $userMenuAssociations[] = $rowUserMenu['menu_id'];
}

if ($m_mode == '') {
    $m_mode = "add";
}
?>

<html>
<head>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <style>
.bold {
            font-weight: bold;
			font-size:20px;
            padding-right: 75px;
			
        }
		
    </style>
</head>
<body>
<section class="container-fluid">
    <form method="POST" name="menu" action="assign_save.php">
        <input type="hidden" name="m_mode" value="<?php echo  $m_mode; ?>">
        <input type="hidden" name="id" value="<?php echo  $id; ?>">
        <label class="form-label">User name:-</label><br>
        <select name="user_id" onchange='form.submit()'>
            <option value="">Select</option>
            <?php
            $sql = "SELECT * FROM user ORDER BY username ASC";
            $interest = mysqli_query($conn, $sql);

            while ($row = mysqli_fetch_array($interest)) {
                $username = $row['username'];
                $userId = $row['id'];
                ?>
                <option value="<?php echo  $userId; ?>" <?php if ($user_id == $userId) echo 'selected'; ?>>
                    <?php echo  $username; ?>
                </option>
                <?php
            }
            ?>
        </select>
        <button type="submit" class="btn btn-outline-secondary" style="margin-left:1055px;" name="submit"
                onclick="return valid_menu_assgin();"> Save
        </button>
        <br><br>
        <?php
        echo '<table id="tabledata" class="table table-striped table-hover table-bordered">';
        echo '<tr class="bg-light text-dark text-center">';
        echo '<th>S No</th>';
        echo '<th>Menu Name</th>';
        echo '</tr>';
        $sno = 1;
        fetchMenuItemsByParentId(0, $user_id, $sno);

        echo '</table>';
        ?>

    </form>
</section>

<script>
    $(document).ready(function () {
        $('select[name="user_id"]').change(function () {
            var userId = $(this).val();

            $.ajax({
                url: 'get_user_menus.php',
                type: 'POST',
                data: {user_id: userId},
                success: function (data) {
                    var userMenus = JSON.parse(data);
                    $('input[name="menu_id[]"]').prop('checked', false);

                    userMenus.forEach(function (menuId) {
                        $('input[name="menu_id[]"][value="' + menuId + '"]').prop('checked', true);
                    });
                }
            });
        });
    });
</script>

<script>
    function confirmLogout() {
        var confirmLogout = confirm('Are you sure you want to logout?');
        if (confirmLogout) {
            window.location.href = "logout.php";
        }
    }
</script>
</body>
</html>

<?php
function fetchMenuItemsByParentId($parent_id, $user_id, &$sno)
{
    global $conn;

    $sql = "SELECT * FROM menu WHERE parent_id = '$parent_id' ";
    $result = mysqli_query($conn, $sql);

    while ($row = mysqli_fetch_assoc($result)) {
        $id = $row['id'];
        $name = $row['menu_name'];

       $bold = ($parent_id == 0) ? 'bold' : ''; 

        echo '<tr class="text-center ' . $bold . ' ">';
        echo '<td>' . $sno . '</td>';
        echo '<td><input type="checkbox" class="form-check-input" name="menu_id[]" value="' . $id . '" ' . ($user_id == $id ? 'checked' : '') . ' >' . $name . ' </td>';
        echo '</tr>';

        $sno++;
        fetchMenuItemsByParentId($id, $user_id, $sno);
    }
}
?>
