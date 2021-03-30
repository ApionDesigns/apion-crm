<?php
while ($row = mysqli_fetch_assoc($query)) {

  $output .= '<a href="edit?e=' . $row['client_id'] . '">
                      <div class="flex hover:bg-gray-200 border-white border-b border-gray-200">
                        <div class="flex items-center px-5">
                        </div>
                        <div class="justify-items-start max-w-max">
                          <div class="details">
                            <span>' . $row['first_name'] . " " . $row['last_name'] . " " . '</span>
                            <br><p class="text-xs"> ID' . $row['client_id'] . '</p>
                          </div>
                        </div>
                      </div>
                    </a>
                    ';
}
