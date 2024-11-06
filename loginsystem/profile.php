<?php session_start();
include_once('includes/config.php');
if (strlen($_SESSION['id'] == 0)) {
    header('location:logout.php');
} else {

    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="utf-8"/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
        <meta name="description" content=""/>
        <meta name="author" content=""/>
        <title>Profile | Registration and Login System</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet"/>
        <link href="css/styles.css" rel="stylesheet"/>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js"
                crossorigin="anonymous"></script>
        <script type="text/javascript" src="./qrcode-generator/qrcode.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
    </head>
    <body class="sb-nav-fixed">
    <?php include_once('includes/navbar.php'); ?>
    <div id="layoutSidenav">
        <?php include_once('includes/sidebar.php'); ?>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">

                    <?php
                    $userid = $_SESSION['id'];
                    $query = mysqli_query($con, "select * from users where id='$userid'");
                    while ($result = mysqli_fetch_array($query)) {
                        ?>
                        <h1 class="mt-4"><?php echo $result['fname']; ?>'s Profile</h1>
                        <div class="card mb-4">

                            <div class="card-body">
                                <a href="edit-profile.php">Edit</a>
                                <table class="table table-bordered">
                                    <tr>
                                        <th>First Name</th>
                                        <td><?php echo $result['fname']; ?></td>
                                    </tr>
                                    <tr>
                                        <th>Last Name</th>
                                        <td><?php echo $result['lname']; ?></td>
                                    </tr>
                                    <tr>
                                        <th>Email</th>
                                        <td colspan="3"><?php echo $result['email']; ?></td>
                                    </tr>
                                    <tr>
                                        <th>Contact No.</th>
                                        <td colspan="3"><?php echo $result['contactno']; ?></td>
                                    </tr>

                                    <tr>
                                        <th>Reg. Date</th>
                                        <td colspan="3"><?php echo $result['posting_date']; ?></td>
                                    </tr>
                                    </tr>

                                    <tr>
                                        <th>Ticket</th>
                                        <td colspan="3"><?php echo $result['ticket']; ?></td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="ticket-container">
                            <button id="toggleButton" class="px-4 py-2 bg-blue-500 rounded">Show ticket</button>
                            <div id="toggleDiv" class="qr-container hidden">
                                <div id="ticketBody" class="ticket-body">
                                <span class="title">
                                <?php echo $result['fname']; ?>&nbsp<?php echo $result['lname']; ?>
                                </span>


                                    <?php if ($result['ticket'] == "STANDARD") { ?>
                                        <ul class="fa-ul" style="color:white;">
                                        <li><span class="fa-li"><i style="color:green;" class="fa fa-check"></i></span>Access
                                            to the main event area
                                        </li>
                                        <li><span class="fa-li"><i style="color:green;" class="fa fa-check"></i></span>Opportunity
                                            to experience the full lineup
                                        </li>
                                        <li><span class="fa-li"><i style="color:green;" class="fa fa-check"></i></span>Basic
                                            amenities included
                                        </li>
                                        <li class="text-muted"><span class="fa-li"><i class="fa fa-times"></i></span>Limited
                                            access to VIP sections
                                        </li>
                                        <li class="text-muted"><span class="fa-li"><i class="fa fa-times"></i></span>No
                                            priority entry
                                        </li>
                                        <li class="text-muted"><span class="fa-li"><i class="fa fa-times"></i></span>After
                                            Party
                                        </li>
                                        </ul>
                                    <?php } ?>


                                    <?php if ($result['ticket'] == "PRO") { ?>
                                        <ul class="fa-ul" style="color:white;">
                                            <li><span class="fa-li" style="color:green;"><i class="fa fa-check"></i></span>Priority
                                                entry to the event
                                            </li>
                                            <li><span class="fa-li" style="color:green;"><i class="fa fa-check"></i></span>Exclusive
                                                access to VIP lounges
                                            </li>
                                            <li><span class="fa-li" style="color:green;"><i class="fa fa-check"></i></span>Complimentary
                                                drinks or food vouchers
                                            </li>
                                            <li><span class="fa-li" style="color:green;"><i class="fa fa-check"></i></span>Access
                                                to all 3 days to the event
                                            </li>
                                            <li class="text-muted"><span class="fa-li"><i class="fa fa-times"></i></span>Workshop
                                                Access
                                            </li>
                                            <li class="text-muted"><span class="fa-li"><i class="fa fa-times"></i></span>After
                                                Party
                                            </li>
                                        </ul>
                                    <?php } ?>

                                    <?php if ($result['ticket'] == "PREMIUM") { ?>
                                        <ul class="fa-ul" style="color:white;">
                                            <li><span style="color:green;" class="fa-li"><i class="fa fa-check"></i></span>Priority
                                                entry to the even
                                            </li>
                                            <li><span style="color:green;" class="fa-li"><i class="fa fa-check"></i></span>Free
                                                Drinks
                                            </li>
                                            <li><span style="color:green;" class="fa-li"><i class="fa fa-check"></i></span>Exclusive
                                                access to VIP lounges
                                            </li>
                                            <li><span style="color:green;" class="fa-li"><i class="fa fa-check"></i></span>Access
                                                to all 3 days to the event
                                            </li>
                                            <li><span style="color:green;" class="fa-li"><i class="fa fa-check"></i></span>Workshop
                                                Access
                                            </li>
                                            <li><span style="color:green;" class="fa-li"><i class="fa fa-check"></i></span>After
                                                Party
                                            </li>
                                        </ul>
                                    <?php } ?>
                                    <span class="ticket-type"><?php echo $result['ticket']; ?> Access</span>
                                    <div id="qrcode"></div>
                                </div>

                                <button id="exportButton" class="px-4 py-2 bg-blue-500 rounded mt-2">Export ticket</button>
                            </div>
                        </div>

                        <script>
                            const exportButton = document.getElementById('exportButton');

                            async function generateTicketPdf() {
                                const { jsPDF } = window.jspdf;
                                const element = document.getElementById('ticketBody');

                                // Use html2canvas to capture the element as a canvas
                                const canvas = await html2canvas(element);
                                const imgData = canvas.toDataURL('image/png');

                                // Create a jsPDF instance
                                const pdf = new jsPDF('p', 'mm', 'a4');

                                // Add the image to the PDF
                                <?php if($result['ticket'] == 'PREMIUM') { ?>
                                pdf.addImage(imgData, 'PNG', 50, 25, 110, 220);

                                <?php }
                                else { ?>
                                pdf.addImage(imgData, 'PNG', 40, 25, 140, 220);

                                <?php }?>

                                // Save the PDF
                                pdf.save('exported-content.pdf');
                            }


                            exportButton.addEventListener('click', generateTicketPdf);
                        </script>

                    <?php } ?>

                </div>
            </main>
            <?php include('includes/footer.php'); ?>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"
            crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="assets/demo/chart-area-demo.js"></script>
    <script src="assets/demo/chart-bar-demo.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
    <script src="js/datatables-simple-demo.js"></script>
    </body>

    <script>
        var qrcode = new QRCode("qrcode");
        const toggleButton = document.getElementById('toggleButton');

        function generateQR() {
            qrcode.makeCode("https://universitetipolis.edu.al");
            const toggleDiv = document.getElementById('toggleDiv');

            if (toggleDiv.classList.contains('hidden')) {
                toggleDiv.classList.toggle('hidden');
                toggleButton.textContent = 'Hide ticket';
            } else {

                toggleDiv.classList.toggle('hidden');
                toggleButton.textContent = 'Show ticket';
            }
        }

        async function generateTicketPdf() {
            const { jsPDF } = window.jspdf;
            const element = document.getElementById('ticketBody');

            // Use html2canvas to capture the element as a canvas
            const canvas = await html2canvas(element);
            const imgData = canvas.toDataURL('image/png');

            // Create a jsPDF instance
            const pdf = new jsPDF('p', 'mm', 'a4');

            // Add the image to the PDF
            pdf.addImage(imgData, 'PNG', 50, 25, 120, 220);

            // Save the PDF
            pdf.save('exported-content.pdf');
        }


        toggleButton.addEventListener('click', generateQR);
    </script>
    </html>
<?php } ?>
