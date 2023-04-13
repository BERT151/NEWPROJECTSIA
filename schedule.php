<?php require_once('connection.php') ?>
<?php
include('includes/head.php');
include('includes/header.php');
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RFG Appointment</title>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />

    <link rel="stylesheet" href="./fullcalendar/lib/main.min.css">
    <script src="./fullcalendar/js/jquery-3.6.0.min.js"></script>
    <script src="./fullcalendar/js/bootstrap.min.js"></script>
    <script src="./fullcalendar/lib/main.min.js"></script>
    <style>
        :root {
            --fc-small-font-size: 0.1em;
            --fc-page-bg-color: #fff;
            --fc-neutral-bg-color: black;
            --fc-neutral-text-color: #808080;
            --fc-border-color: black;

            --fc-button-text-color: #362b2b;
            --fc-button-bg-color: black;
            --fc-button-border-color: black;
            --fc-button-hover-bg-color: black;
            --fc-button-hover-border-color: black;
            --fc-button-active-bg-color: black;
            --fc-button-active-border-color: black;

            --fc-event-bg-color: black;
            --fc-event-border-color: black;
            --fc-event-text-color: #fff;
            --fc-event-selected-overlay-color: rgba(0, 0, 0, 0.25);

            --fc-more-link-bg-color: #d0d0d0;
            --fc-more-link-text-color: inherit;

            --fc-non-business-color: rgba(215, 215, 215, 0.3);
            --fc-bg-event-color: rgb(143, 223, 130);
            --fc-bg-event-opacity: 0.3;
            --fc-highlight-color: black;
            --fc-today-bg-color: rgba(47, 40, 255, 0.15);
            --fc-now-indicator-color: red;
        }
    </style>
    <style>
        table,
        tbody,
        td,
        tfoot,
        th,
        thead,
        tr {
            border-color: #ededed !important;
            border-style: solid;
            border-width: 1px !important;
            background-color: white;
        }

        * {
            font-size: 16px;
        }

        .fc-next-button,
        .fc-prev-button,
        .fc-today-button {
            padding: 1px !important;
            width: 50px !important;
            height: 50px;

        }

        .active {
            background-color: black !important;
        }

        .fc-today-button {
            background-color: black !important;
        }
    </style>
</head>

<main>
    <!--? Hero Start -->
    <div class="slider-area2">
        <div class="slider-height2 d-flex align-items-center">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="hero-cap hero-cap2 text-center pt-70">
                            <h2>Schedule</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Hero End -->


    <div class="container py-5" id="page-container">
        <div class="row">
            <div class="col-md-8">
                <div id="calendar"></div>
            </div>
            <div class="col-md-4">
                <div class=" rounded-0 shadow ">
                    <div class="card-header bg-gradient ">
                        <h2 class="card-title text-center">Appointment Form</h2>
                    </div>
                    <div class="card-body bg-light" style="height:55vh">
                        <div class="container-fluid">
                            <form action="save_schedule.php" method="post" id="schedule-form">
                                <input type="hidden" name="id" value="">

                                <div class="form-group mb-2">
                                    <label for="email" class="control-label">Email</label>
                                    <input type="text" class="form-control form-control-lg rounded-0" name="email"
                                        id="email" value=" <?php echo ($user['Email_Add']); ?>" readonly>
                                </div>
                                <div class="form-group mb-2">
                                    <label for="title" class="control-label">Type</label>
                                    <input type="text" class="form-control form-control-lg rounded-0" name="title"
                                        id="title" required>
                                </div>
                                <div class="form-group mb-2">
                                    <label for="start_datetime" class="control-label">Start</label>
                                    <input type="datetime-local" class="form-control form-control-lg rounded-0"
                                        name="start_datetime" min="<?php echo date('Y-m-d\TH:i'); ?>"
                                        id="start_datetime" required>
                                </div>
                                <div class="form-group mb-2">
                                    <label for="end_datetime" class="control-label">End</label>
                                    <input type="datetime-local" class="form-control form-control-lg rounded-0"
                                        name="end_datetime" id="end_datetime">
                                </div>
                                <div class="form-group mb-2">
                                    <label for="title" class="control-label">Status</label>
                                    <input type="text" class="form-control form-control-lg rounded-0" name="status"
                                        id="status" value="Active" readonly>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="card-footer bg-light">
                        <div class="text-center">
                            <button class="btn btn-dark btn-sm rounded-0" type="submit"
                                form="schedule-form">Save</button>
                            <button class="btn btn-light border btn-sm rounded-0" type="reset"
                                form="schedule-form">Cancel</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Event Details Modal -->
    <div class="modal fade" tabindex="-1" data-bs-backdrop="static" id="event-details-modal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content rounded-0">
                <div class="modal-header rounded-0">
                    <h5 class="modal-title">Schedule Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body rounded-0">
                    <div class="container-fluid">
                        <dl>
                            <dt class="text-muted">Type</dt>
                            <dd id="title" class="fw-bold fs-4 text-muted"></dd>
                            <dt class="text-muted">Start</dt>
                            <dd id="start" class=""></dd>
                            <dt class="text-muted">End</dt>
                            <dd id="end" class=""></dd>

                        </dl>
                    </div>
                </div>
                <div class="modal-footer rounded-0">
                    <div class="text-end">
                        <button type="button" class="btn btn-dark btn-sm rounded-0" id="edit" data-id="">Edit</button>
                        <button type="button" class="btn btn-danger btn-sm rounded-0" id="delete"
                            data-id="">Delete</button>
                        <button type="button" class="btn btn-secondary btn-sm rounded-0"
                            data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Event Details Modal -->

    <?php
    $schedules = $con->query("SELECT * FROM `appointment_tbl`");
    $sched_res = [];
    foreach ($schedules->fetch_all(MYSQLI_ASSOC) as $row) {
        $row['sdate'] = date("F d, Y h:i A", strtotime($row['start_datetime']));
        $row['edate'] = date("F d, Y h:i A", strtotime($row['end_datetime']));
        $sched_res[$row['id']] = $row;
    }
    ?>
    <?php
    if (isset($con))
        $con->close();
    ?>
    </body>
    <script>
        var scheds = $.parseJSON('<?= json_encode($sched_res) ?>')
    </script>
    <script src="./fullcalendar/js/script.js"></script>

    </html>