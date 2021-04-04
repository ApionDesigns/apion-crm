<?php
while ($row = mysqli_fetch_assoc($query)) {

  $output .= '<a href="edit?e=' . $row['client_id'] . '">
                      <div class="flex hover:bg-green-50 border-white border-b border-gray-200 p-1 px-4">
                        <div class="justify-items-start>
                          <div class="details">
                            <span>' . $row['first_name'] . " " . $row['last_name'] . '<p class="text-xs italic"> ID' . $row['client_id'] . '</p></span>
                          </div>
                        </div>
                      </div>
                    </a>
                    ';
}
