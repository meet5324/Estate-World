<?php include '../../globalvar/globalvariable.php'; ?>
<?php include $connToPan . 'config.php'; ?>
<?php include $mphpToInc . 'header.php'; ?>
<?php include $funToPan . 'function.php'; ?>
<?php include $mphpToInc . 'navbar.php'; ?>

<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        font-family: 'Arial', sans-serif;
        background-color: #f4f4f4;
        line-height: 1.6;
        color: #333;
    }

    .container {
        width: 100%;
        max-width: 1376px;
    }

    .header {
        text-align: center;
        margin-bottom: 30px;
        background-color: #2c3e50;
        color: white;
        padding: 20px;
    }

    .section-toggle {
        display: flex;
        justify-content: center;
        margin-bottom: 30px;
    }

    .section-toggle button {
        margin: 0 10px;
        padding: 10px 20px;
        background-color: white;
        border: 2px solid #3498db;
        color: #3498db;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .section-toggle button.active {
        background-color: #3498db;
        color: white;
    }

    .content-section {
        background-color: white;
        padding: 30px;
        border-radius: 8px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        display: none;
    }

    .content-section.active {
        display: block;
    }

    .team-grid {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 20px;
    }

    .team-member {
        background-color: white;
        border-radius: 8px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        padding: 20px;
        text-align: center;
        cursor: pointer;
        transition: transform 0.3s ease;
    }

    .team-member:hover {
        transform: scale(1.05);
    }

    .team-member-avatar {
        width: 120px;
        height: 120px;
        background-color: #3498db;
        color: white;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 15px;
        font-size: 48px;
    }

    .modal {
        display: none;
        position: fixed;
        z-index: 1000;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        overflow: auto;
        background-color: rgba(0, 0, 0, 0.5);
    }

    */ .modal-content {
        background-color: white;
        margin: 10% auto;
        padding: 30px;
        border-radius: 8px;
        width: 80%;
        max-width: 500px;
        text-align: center;
        position: relative;
    }

    .close-modal {
        position: absolute;
        top: 10px;
        right: 10px;
        font-size: 24px;
        cursor: pointer;
    }

    .modal-expertise {
        display: flex;
        justify-content: center;
        flex-wrap: wrap;
        margin-top: 20px;
    }

    .expertise-tag {
        background-color: #3498db;
        color: white;
        padding: 5px 10px;
        margin: 5px;
        border-radius: 20px;
        font-size: 14px;
    }

    img {
        height: 160px;
        width: 156px;
        border-radius: 50%;
    }

    @media (max-width: 768px) {
        .team-grid {
            grid-template-columns: repeat(2, 1fr);
        }
    }

    @media (max-width: 480px) {
        .team-grid {
            grid-template-columns: 1fr;
        }
    }
</style>

<div class="container">
    <div class="header">
        <h1>Estate World</h1>
        <p>Transforming Real Estate, Empowering Dreams</p>
    </div>

    <div class="section-toggle">
        <button class="active" data-section="mission">Mission</button>
        <button data-section="values">Values</button>
    </div>

    <div id="mission" class="content-section active">
        <h2>Our Mission</h2>
        <p>Estate World is committed to revolutionizing real estate experiences by providing innovative,
            personalized solutions that empower clients to achieve their property goals. We blend cutting-edge
            technology with deep market expertise to deliver exceptional value.</p>
    </div>

    <div id="values" class="content-section">
        <h2>Our Core Values</h2>
        <ul>
            <li>Integrity in Every Transaction</li>
            <li>Client-Centric Approach</li>
            <li>Continuous Innovation</li>
            <li>Community Commitment</li>
        </ul>
    </div>

    <h2 style="text-align: center; margin: 30px 0;">Our Team</h2>
    <div class="team-grid">
        <div class="team-member" data-name="Elena Rodriguez" data-role="Head of Customer Relations"
            data-bio="Passionate about delivering exceptional customer experiences."
            data-expertise="Client Communication,Problem Solving,Negotiation">
            <img src="about/img1.jpg" alt="img1">
            <h3>Krunal Rajpura</h3>
            <p>Team Leader</p>
        </div>
        <div class="team-member" data-name="David Kim" data-role="Senior Real Estate Advisor"
            data-bio="Specializes in luxury properties and investment strategies."
            data-expertise="Luxury Market,Investment Properties,Client Advisory">
            <img src="about/img2.jpg" alt="img2">
            <h3>Meet Patel</h3>
            <p>Team Member</p>
        </div>
        <div class="team-member" data-name="Emily Wang" data-role="Marketing Director"
            data-bio="Creative strategist driving brand growth and customer engagement."
            data-expertise="Digital Marketing,Brand Strategy,Content Creation">
            <img src="about/img3.jpg" alt="img3">
            <h3>Dhruv Prajapati</h3>
            <p>Team Member</p>
        </div>
        <div class="team-member" data-name="Robert Garcia" data-role="Finance Manager"
            data-bio="Expert in financial planning and real estate investment analysis."
            data-expertise="Financial Analysis,Investment Strategy,Risk Management">
            <img src="about/img4.jpg" alt="img4">
            <h3>Meet Savaliya</h3>
            <p>Team Member</p>
        </div>
    </div>

    <div id="teamModal" class="modal">
        <div class="modal-content">
            <span class="close-modal">&times;</span>
            <h2 id="modalName"></h2>
            <p id="modalRole"></p>
            <p id="modalBio"></p>
            <div id="modalExpertise" class="modal-expertise"></div>
        </div>
    </div>
</div>

<!-- <script>
// Section Toggle
document.querySelectorAll('.section-toggle button').forEach(button => {
    button.addEventListener('click', () => {
        // Remove active from all buttons and sections
        document.querySelectorAll('.section-toggle button').forEach(btn => btn.classList.remove(
            'active'));
        document.querySelectorAll('.content-section').forEach(section => section.classList.remove(
            'active'));

        // Add active to clicked button and corresponding section
        button.classList.add('active');
        document.getElementById(button.dataset.section).classList.add('active');
    });
});

// Team Member Modal
const modal = document.getElementById('teamModal');
const closeModal = document.querySelector('.close-modal');
const modalName = document.getElementById('modalName');
const modalRole = document.getElementById('modalRole');
const modalBio = document.getElementById('modalBio');
const modalExpertise = document.getElementById('modalExpertise');

document.querySelectorAll('.team-member').forEach(member => {
    member.addEventListener('click', () => {
        modalName.textContent = member.dataset.name;
        modalRole.textContent = member.dataset.role;
        modalBio.textContent = member.dataset.bio;

        // Clear previous expertise tags
        modalExpertise.innerHTML = '';
        // Add expertise tags
        member.dataset.expertise.split(',').forEach(expertise => {
            const tag = document.createElement('span');
            tag.classList.add('expertise-tag');
            tag.textContent = expertise;
            modalExpertise.appendChild(tag);
        });

        modal.style.display = 'block';
    });
});

closeModal.addEventListener('click', () => {
    modal.style.display = 'none';
});

window.addEventListener('click', (event) => {
    if (event.target === modal) {
        modal.style.display = 'none';
    }
});
</script> -->



<?php include '../includes/footer.php'; ?>

<?php include '../includes/loader.php'; ?>

<?php include '../includes/endlinks.php'; ?>