 <?php
include "nav_config.php";
$m_mode = $_REQUEST['m_mode'];
$id = $_REQUEST['id'];
$username = $_REQUEST['username'];
$menu_id = $_REQUEST['menu_id'];
echo $m_mode;

if ($m_mode == "add") { 
    if (isset($_REQUEST['submit'])) {
        $user_id = $_REQUEST['user_id'];
        $selected_menu_ids = isset($_REQUEST['menu_id']) ? $_REQUEST['menu_id'] : array();
     if (empty($user_id)) {
        echo '<script>alert("No user selected.")
          window.location.href = "assign_menu.php";
          </script>';
         exit; 
	 } if (empty($menu_id)) {
        echo '<script>alert("No menu selected.")
          window.location.href = "assign_menu.php";
          </script>';
         exit; 
	 }
        $query = "SELECT menu_id FROM user_menu WHERE user_id='$user_id'";
        $result = $conn->query($query);

        $existing_menu_ids = array();
        while ($row = $result->fetch_assoc()) {
            $existing_menu_ids[] = $row['menu_id'];
        }

        $new_menu_ids = array_diff($selected_menu_ids, $existing_menu_ids);
        $deleted_menu_ids = array_diff($existing_menu_ids, $selected_menu_ids);

        foreach ($new_menu_ids as $new_menu_id) {
            $query = "INSERT INTO user_menu (user_id, menu_id) VALUES ('$user_id', '$new_menu_id')";
            $result = $conn->query($query);
        }

        foreach ($deleted_menu_ids as $deleted_menu_id) {
            $query = "DELETE FROM user_menu WHERE user_id='$user_id' AND menu_id='$deleted_menu_id'";
            $results = $conn->query($query);
        }

        if ($result === TRUE) {
            ?>
            <script>
                alert("Records inserted successfully.");
                window.location.href = "assign_display.php";
            </script>
            <?php
        } else if  ($results === TRUE) {
            ?>
            <script>
                alert("Records deleted successfully.");
                window.location.href = "assign_display.php";
            </script>
            <?php
        } else
			{
            echo '<script>alert("Nothing new selected ")
			 window.location.href = "assign_menu.php";

			</script>';
        }
    }
}

?>