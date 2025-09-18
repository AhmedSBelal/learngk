<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Enrollment Received</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
            color: #333;
        }

        .email-container {
            max-width: 600px;
            margin: 30px auto;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .header {
            color: #313131;
            padding: 15px;
            border-radius: 8px 8px 0 0;
            text-align: center;
        }

        .header img {
            max-width: 150px;
            margin-bottom: 10px;
        }

        .content {
            padding: 20px;
        }

        .content p {
            line-height: 1.6;
        }

        .enrollment-details {
            background-color: #f1f1f1;
            padding: 15px;
            border-radius: 5px;
        }

        .enrollment-details ul {
            list-style-type: none;
            padding: 0;
        }

        .enrollment-details ul li {
            padding: 8px 0;
        }

        .enrollment-details ul li strong {
            color: #FECB2C;
        }

        .button-container {
            text-align: center;
            margin-top: 20px;
        }

        .button {
            background-color: #FECB2C;
            color: #313131;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
            font-weight: bold;
        }

        .button:hover {
            background-color: #e0a826;
        }

        .footer {
            text-align: center;
            margin-top: 20px;
            color: #777;
            font-size: 0.9em;
        }
    </style>
</head>
<body>
<div class="email-container">
    <div class="header">
        <img src="https://lgk-kuwait.com/storage/1/62308809a4b82_lgk-logo.svg" alt="LGK Kuwait">
        <h1>New Enrollment Notification</h1>
    </div>
    <div class="content">
        <p>Dear Admin,</p>
        <p>We have received a new enrollment with the following details:</p>
        <div class="enrollment-details">
            <ul>
                <li><strong>Name:</strong> {{ $name }}</li>
                <li><strong>Email:</strong> {{ $email }}</li>
                <li><strong>Phone:</strong> {{ $phone }}</li>
                <li><strong>Course:</strong> {{ $course }}</li>
            </ul>
        </div>
        <p>
            Please follow up with the new enrollment to confirm their registration and provide additional information about the course.
        </p>
        <div class="button-container">
            <a href="{{ route('admin.enrolls.show', $id) }}" class="button">Go to Dashboard</a>
        </div>
    </div>
    <div class="footer">
        <p>&copy; {{ date('Y') }} LGK Kuwait. All rights reserved.</p>
    </div>
</div>
</body>
</html>
