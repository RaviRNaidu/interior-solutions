<?php
// Data for team members and testimonials
$team_members = [
    ['name' => 'Gwen Johnson', 'role' => 'Founder & CEO', 'image' => 'team1.jpg'],
    ['name' => 'Daniel Roberto', 'role' => 'Regional Manager', 'image' => 'team2.jpg'],
    ['name' => 'Dhony Abraham', 'role' => 'Managing Partner', 'image' => 'team3.jpg'],
    ['name' => 'Marko Dugonji', 'role' => 'Chief Executive', 'image' => 'team4.jpg']
];

$testimonials = [
    ['name' => 'Phillip Hunt', 'company' => 'Example Company', 'text' => 'Lorem ipsum dolor sit amet...'],
];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
}

.header {
    background: #333;
    color: white;
    padding: 10px 20px;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.header nav ul {
    list-style: none;
    display: flex;
    gap: 20px;
    margin: 0;
    padding: 0;
}

.header nav ul li {
    display: inline;
}

.header nav ul li a {
    color: white;
    text-decoration: none;
}

.header nav ul li a.active {
    font-weight: bold;
}

.hero {
    background: url('https://media.designcafe.com/wp-content/uploads/2022/07/29185240/industrial-rustic-living-room-in-earthy-tones.jpg') no-repeat center center/cover;
    text-align: center;
    padding: 50px 20px;
}

.hero h2 {
    margin: 0;
    font-size: 36px;
}

.experience {
    padding: 50px 20px;
    text-align: center;
}

.experience img {
    width: 300px;
    margin: 20px auto;
    display: block;
}

.stats {
    display: flex;
    justify-content: space-around;
    padding: 20px;
    background: #f9f9f9;
}

.stats div {
    text-align: center;
}

.team {
    padding: 50px 20px;
    text-align: center;
}

.team-members {
    display: flex;
    justify-content: center;
    gap: 20px;
    flex-wrap: wrap;
}

.team-member {
    text-align: center;
    width: 200px;
}

.team-member img {
    width: 100%;
    border-radius: 50%;
}

.testimonials {
    background: #f5f5f5;
    padding: 50px 20px;
    text-align: center;
}

.testimonial {
    margin: 20px auto;
    max-width: 600px;
}

footer {
    background: #333;
    color: white;
    text-align: center;
    padding: 20px;
}
    </style>
</head>
<body>
    <header class="header">
        <h1>Home Interior</h1>
        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="about.php" class="active">About</a></li>
                <li><a href="services.php">Services</a></li>
                <li><a href="contact.php">Contact</a></li>
            </ul>
        </nav>
    </header>

    <section class="hero">
        <h2>About Us</h2>
        <p>Home > About Page</p>
    </section>

    <section class="experience">
        <h2>We Have 10+ Years of Experience</h2>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam non risus risus.</p>
        <img src="https://images.livspace-cdn.com/plain/https://jumanji.livspace-cdn.com/magazine/wp-content/uploads/sites/2/2021/06/10131120/interior-wall-design.jpg" alt="Experience">
    </section>

    <section class="stats">
        <div>
            <h3>2010</h3>
            <p>Year We Founded</p>
        </div>
        <div>
            <h3>120</h3>
            <p>No. of Awards</p>
        </div>
        <div>
            <h3>1500</h3>
            <p>Daily Clients</p>
        </div>
        <div>
            <h3>1500</h3>
            <p>Projects Done</p>
        </div>
    </section>

    <section class="team">
        <h2>Our Creative Team</h2>
        <div class="team-members">
            <?php foreach ($team_members as $member): ?>
                <div class="team-member">
                    <img src="<?= $member['image'] ?>" alt="<?= $member['name'] ?>">
                    <h3><?= $member['name'] ?></h3>
                    <p><?= $member['role'] ?></p>
                </div>
            <?php endforeach; ?>
        </div>
    </section>

    <section class="testimonials">
        <h2>What Our Clients Say</h2>
        <?php foreach ($testimonials as $testimonial): ?>
            <div class="testimonial">
                <p>"<?= $testimonial['text'] ?>"</p>
                <p>- <?= $testimonial['name'] ?>, <?= $testimonial['company'] ?></p>
            </div>
        <?php endforeach; ?>
    </section>

    <footer>
        <p>© 2021 Home Interior. All Rights Reserved.</p>
    </footer>
</body>
</html>
