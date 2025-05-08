# Akazie Forest Theme

![akazie-forest](https://github.com/AkazieIT/grav-theme-akazie-forest/blob/main/screenshot.jpg)

**Akazie Forest** Theme for [Grav CMS](http://github.com/getgrav/grav).  

## Description

**Akazie - Forest**, is a theme created by Akazie IT GmbH for websites, portfolios and blogs. 

## Sample

[demo site](https://demo.akazie.com/akazie-forest)

## Installation

1. From the root of your Grav installation, run `bin/gpm install akazie-forest`.
   - Alternatively, download this repository, unzip it, rename the folder to `akazie-forest`, and place it in the `user/themes/` directory of your Grav install
2. Edit `user/config/system.yaml` to contain the following:
	```yaml
    pages:
      theme: akazie-wood
	```
3. Go to your container page, (e.g. `Home /` ) -> `Advanced` -> `Page Template` and set it to `Modular`
4. Add your modules to the page (`Advanced` -> top right `Add Module`)
5. Move your content from your page (e.g. `Home /` ) to your module (e.g. `Text` module )

Alternatively, you can install `Akazie - Forest` via the Grav Admin interface.

## Features

core features include

* Logo, Font, Color customisation
* Various design settings (page, header, menu, footer)
* A Custom footer can be implemented if necessary with the Footer module
* Settings for adding tracking codes, custom css + js files
* Blocks with custom text or automatic links in footer
* Blog post types
* Portfolio post types
* Dynamic image sizing for SEO
* Bootstrap style module layout (many modules can be from full width down to 1/6 width)
* Accordion, CTA, hero modules
* JS gallery and slider modules
* Icon lists, images, logo ccollection
* Contact, pricing, testimonial and team modules
* English and German back end


## Plugin support

Currently actively supported plugins:
- Email
- Form
- Langswitcher



## Notice

If you use Langswitcher and decide to uninstall Langswitcher, please deactivate Langswitcher before removing it.
