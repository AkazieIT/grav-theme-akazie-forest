# v0.1.5
1. [](#bugfix)
    * All modules with images: after deleting and re-uploading an image in Admin 2.0, the frontend kept showing the old (deleted) image. Admin 2.0's `pagemedia` field applies uploads/deletes instantly via the API without a page save (in Grav 1 it wrote the file into the header and lit up the Save button — that contract changed upstream), but the rendered module content stays cached under the page file's modification time, which a media-only change never updates. The theme now listens to `onAdminAfterAddMedia`/`onAdminAfterDelMedia` and touches the page's `.md`, so exactly that page's cache refreshes as if it had been saved. No-op on Grav 1, where the site theme is not loaded in the admin. Note for editors: in Admin 2.0 the Save button staying inactive after an image change is correct — media changes are applied immediately, there is nothing left to save
    * Team: Linktext / Link-URL (the LinkedIn line) stayed invisible on the frontend for entries edited in Admin 2.0. The two fields were declared as `.linkedin.linkedin_user` / `.linkedin.linkedinProfile`, but Admin 2.0's list field stores every sub-value under the *last* segment of the field name, so they were saved as flat `linkedin_user` / `linkedinProfile` on the member while the template looked for them nested under `linkedin`. The blueprint now declares the flat names and the template still reads the two older layouts, so existing pages keep rendering
    * Blog Eintrag and Portfolio Eintrag: the Blog / Portfolio tab in Admin was empty. The tab carried an empty `fields:` key, which overwrote the fields injected by `import@` when the blueprint was merged — the tab rendered with its title but no content (affected Grav 1.7 and 2.0 alike)
2. [](#improved)
    * Removed the "Show sidebar", "Show breadcrumbs" and "Show pagination" toggles from the blog and portfolio blueprints. All three were Quark leftovers whose features have been commented out in the templates since the fork, so none of them had any effect
    * Removed the unused `partials/sidebar.html.twig`, which was still pure Quark and referenced translation keys this theme does not define
    * Removed the commented-out Quark boilerplate from the blogpost, portfolio-item and portfolio blueprints
    * Note: pages that had "Show sidebar" explicitly disabled now render like the default. The toggle's only remaining effect was switching a CSS helper class on the content column

# v0.1.45
1. [](#new)
    * Grav 2.0 compatibility (still fully compatible with Grav 1.7)
2. [](#bugfix)
    * Image, TextAndImage and Slider modules: show images in modules created in Admin 2.0
    * Icon List: show icons when the file field is stored as a list instead of a map
    * Team: show e-mail and LinkedIn again; both fields are now independent of each other
    * Portfolio item: gallery no longer drops newly uploaded images, stays empty without `media_order`, or shows only the first image when `media_order` has spaces after the commas — the entries are now trimmed before they are looked up in the page media
    * Admin: translation namespace renamed to `THEME_AKAZIEFOREST` so labels are translated instead of shown as raw keys
    * Gallery: the title/subtitle order field showed "Order by..." with untranslated options — it pointed at the listing-sort translation key instead of `TITLE_ORDER`
    * Removed a stray `placeholder: ===` from the blogpost and portfolio-item blueprints

# v0.1.44
1. [](#bugfix)
    * minor bugfixes

# v0.1.43
1. [](#new)
    * Possibility to add LangSwitcher to mobile menu

# v0.1.42
1. [](#improved)
    * updated readme


# v0.1.41
##  05/15/2025

1. [](#new)
    * Initial publication


# v0.1.0
##  08/17/2023

1. [](#new)
    * ChangeLog started...
