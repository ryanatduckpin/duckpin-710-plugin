# duckpin-710-plugin
Configuration:

INITIAL SETUP:
- Set up mailchimp and put it in the appropriate place in duckpin-710.php.
- Get google recapctcha keys put them in the appropriate place in duckpin-710.php.
- after setting everything in an area, put the shortcodes where necessary.

BLOG [duckpin710_blog]:
- Pulls from existing wp posts. No need to set up a blog page.
- Simply add the above shortcode to your standard page, and adjust the styling as needed.
- Will need to set up a single post page. In general try to replicate thier static page layout (usually page.php). The order of hierarchy for post pages is single-post.php -> single.php. Stay away from editing singular.php -> index.php, as they affect other pages as well.

SOCIAL MEDIA [duckpin710_social]:
- add any social links to the site in duckpin-710.php.
- if using Jpanel mobile menu, you will have to add the class .duckpin710-social to the excludedPanelContent array.
- add shortcode to footer, as close the closing body tag as possible.

NEWSLETTER [duckpin710_newsletter]:
- add shortcode to site.
- add the title as an argument in the shortcode to change the title. [duckpin710_newsletter title=""].

LEAD CERT POP [duckpin710_pop]
- set the desktop signup and exit text, the mobile signup and exit text, and the mobile message.
- edit duckpin710-pop-top.jpg to reflect site.
- if using Jpanel mobile menu, you will have to add the class .duckpin710-pop-contain to the excludedPanelContent array.
- put the shortcode in the footer, as close to the closing body tag as possible.
