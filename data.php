<?php
while ($row = mysqli_fetch_assoc($query)) {

  $output .= '<a href="edit?e=' . $row['client_id'] . '">
                      <div class="flex hover:bg-gray-200 border-white rounded-br-3xl">
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
