# Brand Guidelines v1.0 - Neepa Adventure

> Last updated: 2026-10-13
> Status: Active

## Quick Reference

| Element | Value |
|---------|-------|
| Brand Name | Neepa Adventure |
| Primary Color | #F6BA1A |
| Secondary Color | #526070 |
| Accent Color | #D49806 |
| Heading Font | Manrope |
| Body Font | DM Sans |
| Voice | Inspiring, Trustworthy, Adventurous, Clear |

---

## 1. Color Palette

### Primary Colors

| Name | Hex | RGB | Usage |
|------|-----|-----|-------|
| Primary Amber | #F6BA1A | rgb(246,186,26) | Primary CTAs, active highlights, key badges |
| Amber Flare | #D49806 | rgb(212,152,6) | Hover states, glowing accents, star ratings |
| Primary Dark | #5C4300 | rgb(92,67,0) | High contrast text on light gold, hover outlines |
| Primary Light | #FFDF9F | rgb(255,223,159) | Surface highlights, tag backgrounds |

### Secondary Colors

| Name | Hex | RGB | Usage |
|------|-----|-----|-------|
| Himalayan Slate | #526070 | rgb(82,96,112) | Secondary elements, icons, mountain badges |
| Glacial Ice | #D5E4F7 | rgb(213,228,247) | Secondary button fill, soft feature containers |
| Secondary Dark | #0E1D2A | rgb(14,29,42) | Deep alpine slate, high-contrast dark accents |
| Secondary Dim | #B9C8DA | rgb(185,200,218) | Muted secondary borders and chips |

### Accent Colors

| Name | Hex | RGB | Usage |
|------|-----|-----|-------|
| Amber Flare | #D49806 | rgb(212,152,6) | Primary button hover, spotlight cards |
| Accent Dark | #684C00 | rgb(104,76,0) | Focused rings, active labels |
| Accent Light | #F9BD1E | rgb(249,189,30) | Vibrant accent tags, inverse primary badges |

### Neutral Palette

| Name | Hex | RGB | Usage |
|------|-----|-----|-------|
| Background | #F7F9FF | rgb(247,249,255) | Global page background |
| Alpine Snow | #F7F9FA | rgb(247,249,250) | Card surface background |
| Summit White | #FFFFFF | rgb(255,255,255) | Clean white cards, modals, dropdowns |
| Surface Container | #E4EFFC | rgb(228,239,252) | Feature card surfaces |
| Mist Slate | #E2E7EC | rgb(226,231,236) | Subtle dividers, muted borders |
| Glacier Border | #D2DCE4 | rgb(210,220,228) | Structural card borders and dividers |
| Outline | #827660 | rgb(130,118,96) | Trail dust borders, icon strokes |
| Text Primary | #121D26 | rgb(18,29,38) | Primary headings, body copy |
| Text Secondary | #4F4633 | rgb(79,70,51) | Subtitles, trail metadata, muted labels |
| Ridge Deep | #0F1821 | rgb(15,24,33) | Dark headers, footers, deep contrast |

### Semantic Colors

| State | Hex | Usage |
|-------|-----|-------|
| Success | #25D366 | WhatsApp integration, booking confirmations, positive status |
| Warning | #F6BA1A | Cautions, permit deadlines, weather notices |
| Error | #BA1A1A | Booking errors, destructive actions, form validation |
| Info | #526070 | Trek difficulty advisories, packing notes |

### Accessibility

- Text `#121D26` on `#F7F9FF` background: > 14:1 contrast ratio (AAA compliant)
- Headings and large text meet WCAG 2.1 AA standards
- High-contrast text `#261A00` / `#5C4300` used on top of `#F6BA1A` primary amber

---

## 2. Typography

### Font Stack

```css
--font-heading: 'Manrope', 'Segoe UI', sans-serif;
--font-body: 'DM Sans', 'Segoe UI', sans-serif;
--font-mono: 'JetBrains Mono', 'Fira Code', monospace;
```

### Roles & Usage

- **Display & Headings:** `Manrope` (Weights: 500, 600, 700, 800)
  - Applied to `h1` through `h6`, hero titles, section titles, card headers, labels, and badges.
- **Body & Interface:** `DM Sans` (Weights: 400, 500, 700)
  - Applied to standard paragraphs, itinerary descriptions, forms, buttons, and navigation.

### Type Scale

| Token | Size | Line Height | Font | Weight | Usage |
|-------|------|-------------|------|--------|-------|
| Display XL | 56px | 1.15 | Manrope | 700 / 800 | Hero titles |
| Headline LG | 36px | 1.25 | Manrope | 700 | Page headings, section titles |
| Headline MD | 26px | 1.3 | Manrope | 600 / 700 | Trek titles, card titles |
| Headline SM | 20px | 1.35 | Manrope | 600 | Subsections, modal titles |
| Body LG | 18px | 1.6 | DM Sans | 400 / 500 | Hero intro paragraphs |
| Body MD | 15px | 1.5 | DM Sans | 400 | Standard body text, descriptions |
| Body SM | 13px | 1.5 | DM Sans | 400 | Meta text, trip stats, timestamps |
| Label MD | 14px | 1.4 | Manrope | 600 | Button labels, tabs |
| Label SM | 12px | 1.4 | Manrope | 600 | Small buttons, chip labels |
| Badge Caption | 11px | 1.3 | Manrope | 700 | Difficulty tags, status pills |

---

## 3. Logo & Brand Mark

### Usage Rules

- Always preserve clear space around the Neepa Adventure wordmark and compass mark.
- Do not distort, skew, or alter the aspect ratio.
- On dark backgrounds, use summit white text with primary amber accents.
- On light backgrounds, use deep ridge `#121D26` text with primary amber accents.

---

## 4. Voice & Tone

### Brand Personality

| Trait | Description |
|-------|-------------|
| **Inspiring** | Celebrating the majestic beauty of the Himalayas and the spirit of high-altitude exploration |
| **Trustworthy** | Deeply grounded in safety, expert Sherpa leadership, transparent itineraries, and certified operations |
| **Adventurous** | Energetic, passionate about the trails, peaks, and cultural heritage of Nepal |
| **Clear & Concise** | Straightforward details on trek difficulty, packing lists, permits, and pricing without hype |

### Voice Chart

| Trait | We Are | We Are Not |
|-------|--------|------------|
| Inspiring | Soul-stirring, respectful of the mountains | Exaggerated, reckless |
| Trustworthy | Safety-first, certified, honest | Overpromising, careless |
| Adventurous | Bold, authentic, culturally immersive | Touristy, commercialized |
| Clear | Actionable, informative, precise | Vague, jargon-heavy |

### Prohibited Terms

| Avoid | Preferred Alternative |
|-------|-----------------------|
| Cheap trek | Value expedition / Accessible adventure |
| Conquer the mountain | Summit responsibly / Experience the peak |
| Easy walk (for high altitude) | Gentle trek / Moderate acclimatization pace |
| Touristy | Culturally authentic / Local exploration |
| Dispatch (any form) | Briefing / Updates / Newsletter / Operations Base / Field Notes |

---

## 5. Visual Mood & Imagery (AI Generation)

### Base Prompt Template

```
Professional high-altitude adventure photography in the Nepal Himalayas, dramatic mountain peaks, crisp alpine atmosphere, natural daylight with warm golden sunlight flare (#F6BA1A), deep slate-blue mountain ridges (#526070), authentic trekking experience, pristine Himalayan environment, cinematic composition.
```

### Style Keywords

| Category | Keywords |
|----------|----------|
| **Lighting** | Golden hour mountain sunlight, crisp alpine morning light, dramatic summit rim lighting |
| **Mood** | Inspiring, majestic, adventurous, serene, rugged, trustworthy |
| **Composition** | Sweeping Himalayan vistas, leading trail lines, rule of thirds, heroic trekking scale |
| **Color Treatment** | Crisp snow whites (#FFFFFF), warm golden amber accents (#F6BA1A), deep mountain slates (#526070) |

### Visual Mood Descriptors

- Pristine Himalayan snowscapes and rugged mountain trails
- Authentic Sherpa and trekker camaraderie in natural mountain light
- Warm tea-house hospitality with cozy, grounded atmospheres
- Expansive panoramic vistas inspiring awe and deep respect for nature

### Visual Don'ts

| Avoid | Reason |
|-------|--------|
| Unrealistic tropical colors or neon tints | Breaks authentic Himalayan realism |
| Staged, stock-photo studio portraits | Lacks genuine adventure credibility |
| Dangerous, irresponsible mountaineering depictions | Contradicts safety-first brand value |

---

## 7. Border Radius & Roundness System

| Level | Class | Value | Applications |
|---|---|---|---|
| **Primary Cards & Containers** | `rounded-2xl` | 16px | Primary cards, trek cards, blog cards, review cards, album cards, modals, maps, FAQ items, large feature sections (paired with `border border-outline/10`) |
| **Interactive Controls** | `rounded-xl` | 12px | Inputs, selects, textareas, search bars, primary & secondary action buttons, departure slot pickers, inner metric blocks |
| **Badges & Chips** | `rounded-lg` / `rounded-md` | 8px / 6px | Difficulty chips, altitude tags, image caption badges, social buttons, plain affiliation & payment logos |
| **Pills & Indicators** | `rounded-full` | 9999px | Filter pills, status chips, ping dots, user avatars |
| **Header Layout Offset** | `pt-28` | 7rem | Standard `<main>` top padding under the fixed `<x-header />` |

