<?php
while ($row = mysqli_fetch_assoc($query)) {

  $output .= '<a href="edit?e=' . $row['client_id'] . '">
                      <div class="flex hover:bg-gray-400 p-1 px-4">
                        <div class="justify-items-start>
                          <div class="details">
                            <span>' . $row['first_name'] . " " . $row['last_name'] . ' | ID' . $row['client_id'] . '</span>
                          </div>
                        </div>
                      </div>
                    </a>
                    ';
}
