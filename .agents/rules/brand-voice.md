# Brand Voice & UI Terminology Rules

## 1. Prohibited Terms
Do NOT use the following terms anywhere in the application (UI copy, marketing text, blade templates, routes, buttons, badges, forms, or guides):

- **"Dispatch"**: Strictly prohibited in all variations (`dispatch`, `dispatches`, `dispatch unit`, `dispatch desk`, etc.).
  - For newsletters / updates &rarr; Use **"Briefing"**, **"Newsletter"**, or **"Updates"**.
  - For operations & logistics &rarr; Use **"Operations Base"**, **"Operations Desk"**, or **"Operations Center"**.
  - For blog / editorial posts &rarr; Use **"Field Notes"**, **"Articles"**, or **"Guides"**.
  - For equipment & satellite gear &rarr; Use **"Satellite Communicator"** or **"Satellite Link"**.
- **"Cheap trek"** &rarr; Use **"Value expedition"** or **"Accessible adventure"**.
- **"Conquer the mountain"** &rarr; Use **"Summit responsibly"** or **"Experience the peak"**.
- **"Easy walk"** (for high altitude / passes) &rarr; Use **"Gentle trek"** or **"Moderate acclimatization pace"**.
- **"Touristy"** &rarr; Use **"Culturally authentic"** or **"Local exploration"**.

## 2. Footer Affiliations & Payment Methods
- Display affiliations and payment method logos as **plain rounded images** (`rounded-lg`) without container boxes, borders, outlines, or hover scaling transforms.

## 3. UI Roundness Consistency System
Maintain strict border-radius hierarchy across all frontend templates:
- **`rounded-2xl` (16px)**: Primary cards, containers, trek/blog/review/album cards, modals, maps, and large feature sections (paired with `border border-outline/10`).
- **`rounded-xl` (12px)**: Interactive controls and form elements — inputs, selects, textareas, search bars, primary/secondary buttons, date departure selectors, and inner metric blocks.
- **`rounded-lg` or `rounded-md` (8px / 6px)**: Badges, difficulty/altitude chips, packing list items, social buttons, and affiliation/payment logos.
- **`rounded-full` (9999px)**: Avatars, difficulty/season filter toggle pills, live telemetry ping dots, and status indicators.
- **`<main>` Top Padding**: Pages under the fixed `<x-header />` must strictly use `pt-28` (never `pt-48` or `pt-32`).
