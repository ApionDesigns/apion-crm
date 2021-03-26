<?php
while ($row = mysqli_fetch_assoc($query)) {

  $output .= '<a href="edit?edit_id=' . $row['client_id'] . '">
                      <div class="flex rounded-md hover:bg-gray-200">
                        <div class="flex items-center m-2">
                        </div>
                        <div class="justify-items-start max-w-max">
                          <div class="details p-2">
                            <span CLASS="border-b border-gray-200">' . $row['first_name'] . " " . $row['last_name'] . " " . '</span>
                            <br><p class="text-xs"> ID' . $row['client_id'] . '</p>
                          </div>
                        </div>
                      </div>
                    </a>
                    ';
}
