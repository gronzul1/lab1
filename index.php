<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Info Lab1</title>
    <style>
        h2 {
            color: var(--blue);
        }
        b{
            color: white;
        }
    </style>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootswatch@4.5.2/dist/slate/bootstrap.min.css" integrity="sha384-8iuq0iaMHpnH2vSyvZMSIqQuUnQA7QM+f6srIdlgBrTSEyd//AWNMyEaSF2yPzNQ" crossorigin="anonymous">
</head>

<body>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="jumbotron">
                    <h2>
                        Welcome to Autoscale Instance for LAB1
                    </h2>
                    <p>
                        Configure and Connect a MySQL Database Instance with a Web Server and Set up the Monitoring of the Solution
                        Course-end Project 1
                    </p>

                    <b>DESCRIPTION</b>    
                <p>
                    Your organization wants to deploy a new multi-tier application. The application will take live inputs from the employees, and it will be hosted on a web server running on the AWS cloud. The development team has asked you to set up the web server and configure it to scale automatically in cases of a traffic surge, to make the application highly available. They have also asked you to take the inputs from the employees and store them securely in the database.                
                </p>
                <p>
                
                    Skills used in the project and their usage in the industry are given below:
                <ul>
                    <li>
                        AWS console - The AWS Management Console is a web application that includes and references several service consoles for managing AWS services.
                    </li>
                    <li>
                        EC2 Instance - Amazon EC2 provides a large set of instance types that are customized to certain use cases.
                    </li>
                    <li>
                        Apache Web Server - As a Web server, Apache is in charge of accepting directory (HTTP) requests from Internet users and delivering the requested data in the form of files and Web pages.                        
                    </li>
                </ul>                                        
                </p>        
                    <p>
                        <a class="btn btn-info btn-large" href="webapp.php"> Go to... LAB PAGE</a>
                    </p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <h4>
                    Current time 
                </h4>
                <p>
                    <?php 
                    $date = date('d-m-y h:i:s');
                    echo $date;
                    ?>
                </p>
            </div>
            <div class="col-md-6">
                <h4>
                    EC2 Server Hostname
                </h4>
                <p>
                    <?php echo gethostname(); ?>
                </p>
            </div>
        </div>
    </div>    
</body>
</html>