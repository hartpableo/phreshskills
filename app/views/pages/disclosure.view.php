<?php get_template_part('header'); ?>

<section class="has-overlay bg-fixed bg-center bg-cover relative isolate py-5 lg:py-10 h-full" style="background-image: url(<?php echo image_uri('hero-bg.webp'); ?>);background-repeat: no-repeat;">
  <article class="container max-w-2xl py-16 text-gray-200" role="article">

    <h1 class="text-4xl font-secondary text-gold font-bold">Phreshskills Full Disclosure</h1>
    <p class="mb-7 text-sm">Last Updated: October 29, 2023</p>

    <div class="body">
      <p>Welcome to Phreshskills! I value transparency and want to ensure that you have a clear understanding of how this platform operates and the principles I adhere to. Please read the following Full Disclosure Statement carefully:</p>
      <ol class="list-decimal list-outside ml-5 mb-8">
        <li class="mb-1">
          <strong class="text-lg mb-5">Purpose</strong>
          <p>Phreshskills is a platform designed to connect Filipino jobseekers with potential employers. My goal is to provide a seamless and user-friendly experience for both jobseekers and employers.</p>
        </li>
        <li class="mb-1">
          <strong class="text-lg mb-5">Ownership and Contact</strong>
          <ul class="mb-3">
            <li>Name: Hart Pableo</li>
            <li>Email: <code>pableoh@gmail.com</code></li>
          </ul>
          <p>I am a Web Developer/Programmer by profession with great passion for building things that solves problems. This platform is my very first attempt in providing solutions to the public. It is still apparent here in the Philippines that although more Filipinos are already aware of online, "work-from-home", or remote work, a lot of us are still finding it difficult to get started. Hence, I decided to put my skills and experience as a self-taught and aspiring full-stack developer to the test with this platform (and more platforms to come.).</p>
          <p>I see this platform as one that connects Filipino jobseekers, especially those with entry-level experience, to amazing job opportunities and teams around the world.</p>
          <p>I hope you will be enjoying your time with Phreshskills! To jobseekers, I hope you get the career that you've always dreamed of. To employers, I hope you get to find the right candidates and form your rockstar team!</p>
        </li>
        <li class="mb-1">
          <strong class="text-lg mb-5">Privacy</strong>
          <ol class="ml-3" style="list-style-type: lower-roman;">
            <li>
              Information Collected
              <ul class="list-disc ml-4">
                <li>User-Provided Information: When you create an account or use the platform, we may collect personal information, such as your name, email address, and any additional information you choose to provide.</li>
                <li>Job Listings: Information provided in job listings, including job descriptions, company details, and contact information.</li>
                <li>User Contributions: Content you voluntarily provide, such as comments, reviews, or other user-generated content.</li>
              </ul>
            </li>
            <li>
              How Your Information Is Used
              <ul class="list-disc ml-4">
                <li>To connect job seekers with potential employers.</li>
                <li>To improve and personalize your experience on our platform.</li>
                <li>To communicate with you regarding your account, job listings, or other platform-related matters.</li>
              </ul>
            </li>
            <li>
              Data Sharing
              <ul class="list-disc ml-4">
                <li>We may share your information with third parties as necessary to provide our services. However, we will not sell, rent, or trade your personal information to third parties for marketing purposes.</li>
              </ul>
            </li>
            <li>
              Data Security
              <ul class="list-disc ml-4">
                <li>We implement reasonable security measures to protect your data. However, please be aware that no method of data transmission over the internet is entirely secure, and we cannot guarantee the absolute security of your information.</li>
              </ul>
            </li>
            <li>
              Cookies and Analytics
              <ul class="list-disc ml-4">
                <li>We may use cookies and similar tracking technologies to enhance your user experience and collect usage data. This helps us understand how our platform is used and allows us to improve our services.</li>
              </ul>
            </li>
            <li>
              Third-Party Links
              <ul class="list-disc ml-4">
                <li>Our platform may contain links to third-party websites. We are not responsible for the privacy practices or content of these websites. Please review the privacy policies of any third-party sites you visit.</li>
              </ul>
            </li>
            <li>
              Your Choices
              <ul class="list-disc ml-4">
                <li>You have the option to update or delete your account information at any time. You can also adjust your browser settings to reject cookies, although this may impact your experience on our platform.</li>
              </ul>
            </li>
            <li>
              Children's Privacy
              <ul class="list-disc ml-4">
                <li>Phreshskills is not intended for individuals under the age of 18. We do not knowingly collect personal information from children.</li>
              </ul>
            </li>
            <li>
              Changes to This Policy
              <ul class="list-disc ml-4">
                <li>We may update this Privacy Policy from time to time. Any changes will be posted on our website, and the revised policy will apply to all data collected after the updated policy is published.</li>
              </ul>
            </li>
            <li>
              Contact Us
              <ul class="list-disc ml-4">
                <li>If you have questions or concerns about this Privacy Policy or your data, please
                  <a href="mailto:pableoh@gmail.com">contact me</a>.</li>
              </ul>
            </li>
          </ol>
        </li>
        <li class="mb-1">
          <strong class="text-lg mb-5">Financial</strong>
          <p>I am planning on adding premium benefits or features for employers at a decided price. This is an upcoming feature.</p>
          <p>Jobseeker registration/signup has no payments of any sort. It is totally free to create an account and look for job openings.</p>
        </li>
        <li class="mb-1">
          <strong class="text-lg mb-5">Updates and Changes</strong>
          <p>We may update this Full Disclosure Statement from time to time. The most recent version will be posted on our website.</p>
          <p>It is your responsibility to review this statement periodically to stay informed about how Phreshskills operates.</p>
        </li>
        <li class="mb-1">
          <strong class="text-lg mb-5">Credits</strong>
          <p>Emojis are taken from <a href="https://emojipedia.org/" target="_blank" rel="nofollow noreferrer">https://emojipedia.org/</a>.</p>
        </li>
      </ol>
      <p>Please feel free to <a href="mailto:pableoh@gmail.com">contact me</a> if you have any questions or concerns about our Full Disclosure Statement or any other aspect of our platform.</p>
      <p>This disclosure statement will be continuously updated as needed.</p>
      <p>Thank you for using Phreshskills. We appreciate your trust and look forward to helping you in your job search or recruitment efforts.</p>
      <p>Sincerely,<br> Hart Pableo</p>
    </div>

  </article>
</section>

<script>
  // Scan through the content of .body and find the "Phreshskills" string
  // Add a <strong> tag before it and </strong> after it
  // Replace the string with the new string
  const body = document.querySelector('.body');
  const bodyContent = body.innerHTML;
  const newBodyContent = bodyContent.replace(/Phreshskills/g, '<strong>Phreshskills</strong>');
  body.innerHTML = newBodyContent;
</script>

<?php get_template_part('footer'); ?>