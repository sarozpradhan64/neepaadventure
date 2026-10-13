---
name: brand-guidelines
description: Official Neepa Adventure brand guidelines, color system, typography scales, voice & tone rules, prohibited terminology, logo usage, and AI image generation prompts. Use when creating, styling, or auditing any UI, marketing copy, trek descriptions, or visual assets for Neepa Adventure.
---

# Neepa Adventure Brand Guidelines & Design System Skill

Comprehensive guide to the official visual identity, typography, design tokens, voice & tone, prohibited terminology, and AI visual prompt frameworks for **Neepa Adventure** (Bespoke Himalayan Expeditions & Guide-Led Journeys).

---

## 1. Quick Reference & Identity Snapshot

| Element | Value | Notes |
|---------|-------|-------|
| **Brand Name** | Neepa Adventure | Never abbreviate in customer-facing titles |
| **Slogan / Tagline** | *Explore Nepal. Experience the Himalayas.* | Official company motto |
| **Primary Amber** | `#F6BA1A` | Main CTAs, badges, brand accents |
| **Amber Flare** | `#D49806` | Hover states, glowing accents, star ratings |
| **Himalayan Slate** | `#526070` | Secondary icons, mountain tags, metadata |
| **Deep Ridge** | `#0F1821` / `#121D26` | Deep navy/slate for dark sections & text |
| **Summit White** | `#FFFFFF` | Cards, modals, crisp contrast elements |
| **Heading Font** | `Manrope`, sans-serif | Weights: 500, 600, 700, 800 |
| **Body Font** | `DM Sans`, sans-serif | Weights: 400, 500, 700 |
| **Code / Mono** | `JetBrains Mono`, monospace | Weights: 400, 500 |
| **Voice Persona** | Inspiring, Trustworthy, Adventurous, Clear | Rooted in Sherpa heritage & mountain safety |

---

## 2. Color Palette & Semantic Tokens

### 2.1 Primary & Accent Colors

| Token / Class | Hex Code | RGB | Usage |
|---------------|----------|-----|-------|
| `bg-primary`, `text-primary` | `#F6BA1A` | `rgb(246,186,26)` | Primary buttons, active tabs, key highlight badges |
| `bg-primary-container` | `#F6BA1A` | `rgb(246,186,26)` | High-emphasis primary button surfaces |
| `text-on-primary-fixed` | `#261A00` / `#0F1821` | High-contrast dark | Text label inside primary amber buttons |
| `bg-amber-flare`, `text-amber-flare` | `#D49806` | `rgb(212,152,6)` | Button hover states, star ratings, warm glow |
| `primary-dark` | `#5C4300` | `rgb(92,67,0)` | High-contrast outlines & borders on gold |
| `primary-light` | `#FFDF9F` | `rgb(255,223,159)` | Soft highlight surfaces, light tag backgrounds |

### 2.2 Secondary & Neutral Colors

| Token / Class | Hex Code | RGB | Usage |
|---------------|----------|-----|-------|
| `text-secondary`, `bg-secondary` | `#526070` | `rgb(82,96,112)` | Secondary elements, mountain badges, trail icons |
| `glacial-ice` | `#D5E4F7` | `rgb(213,228,247)` | Soft feature containers, secondary button fill |
| `secondary-dim` | `#B9C8DA` | `rgb(185,200,218)` | Muted secondary borders, inactive tags |
| `bg-surface` | `#F7F9FF` | `rgb(247,249,255)` | Global canvas background |
| `bg-surface-container-low` | `#F7F9FA` | `rgb(247,249,250)` | Section alternating backgrounds, soft containers |
| `bg-surface-container-lowest` | `#FFFFFF` | `rgb(255,255,255)` | Standard card backgrounds, modals, flyouts |
| `bg-ridge-deep`, `text-ridge-deep` | `#0F1821` | `rgb(15,24,33)` | High-contrast dark heroes, footers, dark bars |
| `border-outline/10` | `#D2DCE4` | `rgba(210,220,228,0.1)` | Clean card borders and subtle dividers |
| `text-on-surface` | `#121D26` | `rgb(18,29,38)` | High-contrast primary titles, headings, body |
| `text-tertiary` | `#526070` | `rgb(82,96,112)` | Subtitles, trail metadata, timestamps |

### 2.3 Semantic Status Colors

| Role | Class | Hex Code | Usage |
|------|-------|----------|-------|
| **Success** | `bg-success`, `text-success` | `#25D366` | WhatsApp integration, guaranteed departures, confirmations |
| **Warning** | `bg-primary-container/20 text-on-primary-fixed-variant` | `#F6BA1A` | Limited slots left, weather advisories, seasonal cautions |
| **Error** | `bg-error`, `text-error` | `#BA1A1A` | Sold out status, validation errors, destructive actions |
| **Info** | `text-primary`, `bg-primary/10` | `#526070` / `#F6BA1A` | Elevation advisory, gear checklist notes, permit badges |

### 2.4 Contrast & Accessibility Guidelines

- **AAA Compliance**: Text `#121D26` (Deep Ridge) on `#F7F9FF` (Canvas) has a contrast ratio greater than 14:1.
- **Buttons on Amber**: Never use plain white (`#FFFFFF`) text on Primary Amber (`#F6BA1A`). Always use `text-on-primary-fixed` (`#261A00` or `#0F1821`) for maximum contrast and legibility.

---

## 3. Typography Stack & Hierarchy

### 3.1 Font Families

```css
--font-heading: 'Manrope', 'Segoe UI', sans-serif;
--font-body: 'DM Sans', 'Segoe UI', sans-serif;
--font-mono: 'JetBrains Mono', 'Fira Code', monospace;
```

- **Headings & Display (`Manrope`)**: Weights 500, 600, 700, 800. Applied to `h1`–`h6`, hero titles, section headers, card titles, badges, and primary buttons.
- **Body & Interface (`DM Sans`)**: Weights 400, 500, 700. Applied to standard paragraphs, itinerary days, trek overviews, forms, and navigation menus.
- **Monospace (`JetBrains Mono`)**: Weights 400, 500. Applied to booking reference codes, GPS coordinates, elevation telemetry, and technical IDs.

### 3.2 Type Scale Reference

| Token | Class | Size | Line Height | Weight | Typical Usage |
|-------|-------|------|-------------|--------|---------------|
| **Display XL** | `.text-display-xl` | 56px | 1.15 | 700 / 800 | Hero titles, main catalog banners |
| **Headline LG** | `.text-headline-lg` | 36px | 1.25 | 700 / 800 | Section headers, page titles |
| **Headline MD** | `.text-headline-md` | 26px | 1.30 | 600 / 700 | Trek title cards, itinerary headers |
| **Headline SM** | `.text-headline-sm` | 20px | 1.35 | 600 / 700 | Subsection titles, modal headers |
| **Body LG** | `.text-body-lg` | 18px | 1.60 | 400 / 500 | Hero intros, lead summary copy |
| **Body MD** | `.text-body-md` | 15px | 1.50 | 400 | Standard body text, descriptions |
| **Body SM** | `.text-body-sm` | 13px | 1.50 | 400 | Meta stats, difficulty, timestamps |
| **Label MD** | `.text-label-md` | 14px | 1.40 | 600 / 700 | Buttons, tabs, active filters |
| **Label SM** | `.text-label-sm` | 12px | 1.40 | 600 | Small action buttons, chip labels |
| **Badge Caption** | `.text-badge-caption` | 11px | 1.30 | 700 | Difficulty pills, status tags |

---

## 4. Brand Voice, Tone & Messaging Framework

### 4.1 Personality Pillars

1. **Inspiring**: Celebrating the sublime grandeur of the Himalayas and the spirit of high-altitude journeying with deep reverence for nature.
2. **Trustworthy**: Grounded in native Sherpa lineage, certified medical doctrine (Gamow bags, pulse oximetry, Garmin satellite links), and transparent pricing.
3. **Adventurous**: Energetic, passionate, culturally authentic, and immersed in local traditions and high passes.
4. **Clear & Concise**: Straightforward facts on altitude acclimatization, gear lists, permit protocols, and route timelines without marketing fluff.

### 4.2 Voice Comparison Matrix

| Aspect | We Are | We Are Not |
|--------|--------|------------|
| **Tone** | Soul-stirring, respectful, humble before the mountains | Boastful, reckless, conqueror-minded |
| **Safety** | Clinically disciplined, satellite-connected, certified | Careless, dismissive, overpromising |
| **Culture** | Native Sherpa partners, respectful of sacred valleys | Commercialized, touristy, extractive |
| **Clarity** | Transparent, precise, actionable | Vague, hyperbolic, jargon-heavy |

### 4.3 Prohibited Terminology & Approved Alternatives

| ❌ Prohibited Term | ✅ Approved Neepa Alternative | Why |
|--------------------|-------------------------------|-----|
| *Cheap trek* | **Value expedition** / **Accessible adventure** | Preserves high safety standards and fair Sherpa wages |
| *Conquer the mountain* | **Summit responsibly** / **Experience the peak** | Aligns with traditional Himalayan respect for sacred summits |
| *Easy walk* (for high passes) | **Gentle trek** / **Moderate acclimatization pace** | Avoids underestimating altitude risks (> 3,500m) |
| *Touristy* | **Culturally authentic** / **Local exploration** | Emphasizes genuine cultural exchange |
| *Unbeatable deals* | **Transparent pricing & direct local operations** | Reinforces ethical and sustainable tourism |
| *Dispatch* (any variation) | **Briefing** / **Newsletter** / **Updates** / **Field Notes** / **Operations Base** | Strictly prohibited across all UI copy, forms, buttons, guides, and marketing assets |

---

## 5. UI Component Design Specifications

### 5.1 Primary Buttons
```html
<a href="{{ route('...') }}" class="inline-flex items-center justify-center gap-2 px-5 py-3 bg-primary-container hover:bg-amber-flare text-on-primary-fixed text-xs font-bold uppercase tracking-wider rounded-xl transition-all shadow-sm hover:shadow-md cursor-pointer">
    <span>Book Now</span>
    <x-lucide-arrow-right class="size-4" />
</a>
```

### 5.2 Status Pills & Badges
- **Guaranteed Departure**:
  ```html
  <span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-md bg-success/10 text-success text-[11px] font-bold uppercase tracking-wider border border-success/20">
      <x-lucide-check-circle-2 class="size-3" /> Guaranteed Run
  </span>
  ```
- **Few Spots Left (Warning)**:
  ```html
  <span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-md bg-primary-container/20 text-on-primary-fixed-variant text-[11px] font-bold uppercase tracking-wider border border-primary/20">
      <span class="size-1.5 rounded-full bg-amber-flare animate-ping"></span>
      Guaranteed &bull; Few Spots Left
  </span>
  ```
- **Sold Out**:
  ```html
  <span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-md bg-error/10 text-error text-[11px] font-bold uppercase tracking-wider border border-error/20">
      <x-lucide-alert-circle class="size-3" /> Sold Out
  </span>
  ```

### 5.3 Active Filter Buttons
- **Active State**: `bg-primary-container text-on-primary-fixed font-bold shadow-sm rounded-xl`
- **Inactive State**: `bg-surface-container-lowest text-tertiary hover:text-on-surface hover:bg-surface-container border border-outline/10 rounded-xl font-medium`

---

## 6. AI Image Generation & Visual Prompt Rules

When generating imagery using the `generate_image` tool or creating promotional visual concepts:

### 6.1 Base Prompt Template
```
Professional high-altitude adventure photography in the Nepal Himalayas, dramatic snow-capped mountain peaks, crisp alpine atmosphere, natural daylight with warm golden sunlight flare (#F6BA1A), deep slate-blue mountain ridges (#526070), authentic trekking experience, pristine Himalayan environment, cinematic composition.
```

### 6.2 Visual Dos & Don'ts
- **DO**: Show authentic Sherpa guides, dramatic Himalayan mountain light (golden hour and crisp morning rim light), prayer flags, tea-house hospitality, and genuine trail camaraderie.
- **DO NOT**: Generate unrealistic tropical hues, neon saturation, staged stock-photo studio portraits, or dangerous mountaineering without safety equipment.

---

## 7. Developer Scripts & Workflows

To sync and validate brand tokens:
```bash
# Extract brand context
node .agents/skills/brand/scripts/inject-brand-context.cjs

# Sync brand-guidelines.md to design tokens JSON & CSS
node .agents/skills/brand/scripts/sync-brand-to-tokens.cjs

# Extract and inspect colors
node .agents/skills/brand/scripts/extract-colors.cjs --palette
```

## UI Roundness System

| Level | Class | Value | Applications |
|---|---|---|---|
| **Primary Cards & Containers** | `rounded-2xl` | 16px | Primary cards, trek cards, blog cards, review cards, album cards, modals, maps, FAQ items, large feature sections (paired with `border border-outline/10`) |
| **Interactive Controls** | `rounded-xl` | 12px | Inputs, selects, textareas, search bars, primary & secondary action buttons, departure slot pickers, inner metric blocks |
| **Badges & Chips** | `rounded-lg` / `rounded-md` | 8px / 6px | Difficulty chips, altitude tags, image caption badges, social buttons, plain affiliation & payment logos |
| **Pills & Indicators** | `rounded-full` | 9999px | Filter pills, status chips, ping dots, user avatars |
| **Header Layout Offset** | `pt-28` | 7rem | Standard `<main>` top padding under the fixed `<x-header />` |

