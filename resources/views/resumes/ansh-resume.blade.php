<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resume - Ansh Suman</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
            color: #333;
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: #f9f9f9;
        }

        .header {
            border-bottom: 3px solid #3498db;
            padding-bottom: 15px;
            margin-bottom: 20px;
        }

        h1 {
            color: #2c3e50;
            font-size: 28px;
            margin-bottom: 5px;
        }

        .title {
            color: #7f8c8d;
            font-size: 18px;
            font-weight: normal;
            margin-top: 0;
        }

        .contact-info {
            display: flex;
            flex-wrap: wrap;
            gap: 15px;
            margin-top: 10px;
        }

        .contact-info a {
            color: #3498db;
            text-decoration: none;
            display: flex;
            align-items: center;
        }

        .contact-info a:hover {
            text-decoration: underline;
        }

        h2 {
            color: #2c3e50;
            font-size: 20px;
            border-bottom: 2px solid #ecf0f1;
            padding-bottom: 5px;
            margin-top: 25px;
        }

        h3 {
            color: #2980b9;
            font-size: 16px;
            margin-bottom: 5px;
        }

        ul {
            padding-left: 20px;
        }

        li {
            margin-bottom: 8px;
        }

        .experience-item,
        .education-item {
            margin-bottom: 15px;
        }

        .experience-item strong,
        .education-item strong {
            color: #2c3e50;
        }

        .project {
            margin-bottom: 20px;
            padding: 15px;
            background-color: #fff;
            border-left: 4px solid #3498db;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
        }

        .project h3 {
            margin-top: 0;
        }

        .project p {
            margin: 5px 0;
        }

        .skills-list {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
        }

        .skill-category {
            flex: 1;
            min-width: 200px;
        }

        .skill-category strong {
            display: block;
            margin-bottom: 5px;
            color: #2c3e50;
        }
    </style>
</head>

<body>
    <div class="header">
        <h1>Ansh Suman</h1>
        <p class="title">Senior Software Developer</p>
        <div class="contact-info">
            <a href="tel:+91-9755135188">+91-9755135188</a>
            <a href="mailto:yepansh001@gmail.com">yepansh001@gmail.com</a>
        </div>
    </div>

    <section>
        <h2>Professional Summary</h2>
        <p>A highly skilled Full-Stack Laravel Developer with 7 years of experience, specializing in building scalable web applications and integrating complex third-party services. Proficient in Laravel, MySQL, JavaScript, jQuery, and Livewire, with expertise in REST API development using Sanctum and Socialite. Adept at seamlessly integrating APIs such as IRIS CRM, HubSpot CRM, Klaviyo, Abstract API, Zapier, Twilio, and Nexmo to enhance application functionality. Passionate about optimizing system performance, ensuring security, and delivering high-quality, user-centric solutions.</p>
    </section>

    <section>
        <h2>Professional Experience</h2>
        <!-- <div class="experience-item">
            <strong>Capital Numbers Infotech</strong> (May 2021 – Present)<br>
            <em>Software Engineer | Tech: Fullstack Laravel</em>
        </div> -->
        <div class="experience-item">
            <strong>Softsnare Technologies</strong> (May 2018 – Present)<br>
            <em>Senior Software Engineer | Tech: Laravel</em>
        </div>
    </section>

    <section>
        <h2>Core Skills</h2>
        <div class="skills-list">
            <div class="skill-category">
                <strong>Languages:</strong>
                <p>PHP, JavaScript</p>
            </div>
            <div class="skill-category">
                <strong>Backend Technology:</strong>
                <p>Laravel, Livewire</p>
            </div>
            <div class="skill-category">
                <strong>Frontend:</strong>
                <p>HTML5/CSS3, Bootstrap, jQuery</p>
            </div>
            <div class="skill-category">
                <strong>Database & Servers:</strong>
                <p>MySQL, PostgreSQL, SQL Server</p>
            </div>
            <div class="skill-category">
                <strong>Cloud & APIs:</strong>
                <p>AWS S3, Bunny CDN, IRIS CRM, Hubspot, Twilio, Nexmo, Zapier, Klaviyo, Abstract API</p>
            </div>
        </div>
    </section>

    <section>
        <h2>Projects</h2>
        <div class="project">
            <h3>247Payments</h3>
            <p><strong>Technology Stack:</strong> Laravel, Livewire, JavaScript, MySQL</p>
            <p><strong>Description:</strong> Credit Solutions for MSEs.</p>
            <p><strong>Responsibilities:</strong> Backend and database development, IRIS CRM integration, Klaviyo Integration, Abstract API Integration.</p>
        </div>

        <div class="project">
            <h3>Detaild App</h3>
            <p><strong>Technology Stack:</strong> Laravel, Livewire, JavaScript, MySQL, React Native</p>
            <p><strong>Description:</strong> Online solution for customers to get their vehicle repaired by nearby Detailers.</p>
            <p><strong>Responsibilities:</strong> Backend API development, Admin Panel, Database management, Twilio Integration.</p>
        </div>

        <div class="project">
            <h3>IEREK</h3>
            <p><strong>Technology Stack:</strong> Laravel, Livewire, JavaScript, MySQL</p>
            <p><strong>Description:</strong> Online platform to conduct and participate in scientific conferences.</p>
            <p><strong>Responsibilities:</strong> Backend development, Admin Panel, Hubspot Integration.</p>
        </div>

        <div class="project">
            <h3>24hrUrgentDoc</h3>
            <p><strong>Technology Stack:</strong> Laravel, JavaScript, jQuery, MySQL, GIT</p>
            <p><strong>Description:</strong> An online medical service website providing urgent care and medical consultations.</p>
            <p><strong>Responsibilities:</strong> Backend development, API creation, Admin Panel, Fullstack Development.</p>
        </div>

        <div class="project">
            <h3>RenMoney</h3>
            <p><strong>Technology Stack:</strong> Laravel, Node.js, AngularJS, ReactJS, MySQL, GIT</p>
            <p><strong>Description:</strong> A Nigerian fintech software offering personal loans.</p>
            <p><strong>Responsibilities:</strong> API development, Backend Development, Admin Panel.</p>
        </div>

        <div class="project">
            <h3>GoAgent</h3>
            <p><strong>Technology Stack:</strong> Laravel, React Native, ReactJS, MySQL, GIT</p>
            <p><strong>Description:</strong> A platform for clearance and shipment of bulk cargo and containers through auctions and bidding.</p>
            <p><strong>Responsibilities:</strong> API development, Backend logic.</p>
        </div>

        <div class="project">
            <h3>Ideel Art</h3>
            <p><strong>Technology Stack:</strong> Laravel, React Native, ReactJS, MySQL, GIT</p>
            <p><strong>Description:</strong> An e-commerce platform for art enthusiasts to purchase authentic artworks.</p>
            <p><strong>Responsibilities:</strong> API development, Backend Development, Admin Panel, Navixy Integration.</p>
        </div>

        <div class="project">
            <h3>Bo'Bell Jewels</h3>
            <p><strong>Technology Stack:</strong> Laravel, jQuery, MySQL, Square Payment gateway, PayPal</p>
            <p><strong>Description:</strong> A retail e-commerce platform supporting Square payment gateway and POS system.</p>
            <p><strong>Responsibilities:</strong> Laravel Programming, UI Design (HTML, CSS, jQuery), Admin Panel, Fullstack Development.</p>
        </div>

        <div class="project">
            <h3>Wotek FZE</h3>
            <p><strong>Technology Stack:</strong> Laravel, jQuery, MySQL, Stripe Payment gateway, PayPal</p>
            <p><strong>Description:</strong> A B2B e-commerce platform integrated with ERP systems.</p>
            <p><strong>Responsibilities:</strong> Laravel Programming, UI Design (HTML, CSS, jQuery)</p>
        </div>

        <div class="project">
            <h3>Flow Agility</h3>
            <p><strong>Technology Stack:</strong> Laravel, JavaScript, jQuery, MySQL, GIT</p>
            <p><strong>Description:</strong> A social media and event management platform where users can book events, connect, and register their pets.</p>
            <p><strong>Responsibilities:</strong> Laravel Programming, UI Design (HTML, CSS, jQuery), Admin Panel.</p>
        </div>
    </section>

    <section>
        <h2>Education</h2>
        <div class="education-item">
            <strong>Bachelor of Engineering</strong> - Acropolis Institute of Research & Technology, Indore (2016) | Score: 5.9
        </div>
        <div class="education-item">
            <strong>Class 12 (CBSE)</strong> - DAV Public School, Khagaul, Patna (2012) | Score: 69.4%
        </div>
        <div class="education-item">
            <strong>Class 10 (CBSE)</strong> - D.K. Carmel School, Ara, Bihar (2010) | Score: 85.5%
        </div>
    </section>
</body>

</html>