---
name: brand
description: Brand voice, visual identity, messaging frameworks, asset management, brand consistency. Activate for branded content, tone of voice, marketing assets, brand compliance, style guides.
argument-hint: "[update|review|create] [args]"
metadata:
  author: claudekit
  version: "1.0.0"
---

# Brand

Brand identity, voice, messaging, asset management, and consistency frameworks for **Neepa Adventure**.

## Active Brand Theme (Neepa Adventure)

### Brand Colors

| Role | Name | Hex Code | Purpose & Usage |
|------|------|----------|-----------------|
| **Primary Base** | Primary Amber | `#F6BA1A` | Main CTAs, primary buttons, active highlights, key badges |
| **Accent / Hover** | Amber Flare | `#D49806` | Button hover states, star ratings, warm mountain glow |
| **Primary Dark** | Deep Gold | `#5C4300` / `#261A00` | High-contrast text on gold, dark outline variant |
| **Primary Light** | Soft Gold Tint | `#FFDF9F` / `#F9BD1E` | Soft badge backgrounds, inverse primary tags |
| **Secondary Base** | Himalayan Slate | `#526070` | Secondary buttons, mountain badges, supporting elements |
| **Secondary Container** | Glacial Ice | `#D5E4F7` | Soft blue containers, secondary card backgrounds |
| **Secondary Dim** | Slate Mist | `#B9C8DA` | Secondary chips, subtle tags |
| **Tertiary Base** | Ridge Slate | `#4D6072` | Trail metadata, tertiary icons, tags |
| **Canvas / Background** | Soft Glacier | `#F7F9FF` | Global page background |
| **Card Surface** | Alpine Snow | `#F7F9FA` | Standard card backgrounds |
| **Pure White** | Summit White | `#FFFFFF` | Modal containers, elevated white cards |
| **Borders & Dividers** | Glacier Border | `#D2DCE4` / `#E2E7EC` | Card borders, dividers, subtle separators |
| **Outline** | Trail Dust | `#827660` | Architectural outline and search boundaries |
| **Text Primary** | Deep Ridge | `#121D26` / `#0F1821` | Headings, titles, high-emphasis text |
| **Text Muted** | Earthy Slate | `#4F4633` / `#586676` | Captions, itinerary details, subtitles |
| **Semantic Success** | WhatsApp Green | `#25D366` | WhatsApp button, booking confirmations |
| **Semantic Error** | Alpine Red | `#BA1A1A` | Critical alerts, error validations |

### Typography

| Category | Font Family | Weights | Usage |
|----------|-------------|---------|-------|
| **Headings & Display** | `Manrope`, "Segoe UI", sans-serif | 500, 600, 700, 800 | All titles (`h1`–`h6`), `.font-display-xl`, `.font-headline-lg/md/sm`, badges, button labels |
| **Body & Interface** | `DM Sans`, "Segoe UI", sans-serif | 400, 500, 700 | Standard paragraphs, itinerary descriptions, navigation links, and inputs |
| **Monospace / Code** | `JetBrains Mono`, monospace | 400, 500 | Code snippets, technical reference IDs, voucher codes |

#### Type Scale
- **Display XL:** `56px` (`--text-display-xl`) — Hero titles
- **Headline LG:** `36px` (`--text-headline-lg`) — Page & section headers
- **Headline MD:** `26px` (`--text-headline-md`) — Trek titles, card titles
- **Headline SM:** `20px` (`--text-headline-sm`) — Section subheadings, modal titles
- **Body LG:** `18px` (`--text-body-lg`) — Lead paragraphs
- **Body MD:** `15px` (`--text-body-md`) — Standard copy
- **Body SM:** `13px` (`--text-body-sm`) — Meta details, timestamps
- **Label MD:** `14px` (`--text-label-md`) — Buttons, tabs
- **Label SM:** `12px` (`--text-label-sm`) — Chips, small actions
- **Badge / Caption:** `11px` (`--text-badge-caption`) — Status tags

## When to Use

- Brand voice definition and content tone guidance
- Visual identity standards and style guide development
- Messaging framework creation
- Brand consistency review and audit
- Asset organization, naming, and approval
- Color palette management and typography specs

## Quick Start

**Inject brand context into prompts:**
```bash
node scripts/inject-brand-context.cjs
node scripts/inject-brand-context.cjs --json
```

**Validate an asset:**
```bash
node scripts/validate-asset.cjs <asset-path>
```

**Extract/compare colors:**
```bash
node scripts/extract-colors.cjs --palette
node scripts/extract-colors.cjs <image-path>
```

## Brand Sync Workflow

```bash
# 1. Edit docs/brand-guidelines.md (or use /brand update)
# 2. Sync to design tokens
node scripts/sync-brand-to-tokens.cjs
# 3. Verify
node scripts/inject-brand-context.cjs --json | head -20
```

**Files synced:**
- `docs/brand-guidelines.md` → Source of truth
- `assets/design-tokens.json` → Token definitions
- `assets/design-tokens.css` → CSS variables

## Subcommands

| Subcommand | Description | Reference |
|------------|-------------|-----------|
| `update` | Update brand identity and sync to all design systems | `references/update.md` |

## References

| Topic | File |
|-------|------|
| Voice Framework | `references/voice-framework.md` |
| Visual Identity | `references/visual-identity.md` |
| Messaging | `references/messaging-framework.md` |
| Consistency | `references/consistency-checklist.md` |
| Guidelines Template | `references/brand-guideline-template.md` |
| Asset Organization | `references/asset-organization.md` |
| Color Management | `references/color-palette-management.md` |
| Typography | `references/typography-specifications.md` |
| Logo Usage | `references/logo-usage-rules.md` |
| Approval Checklist | `references/approval-checklist.md` |

## Scripts

| Script | Purpose |
|--------|---------|
| `scripts/inject-brand-context.cjs` | Extract brand context for prompt injection |
| `scripts/sync-brand-to-tokens.cjs` | Sync brand-guidelines.md → design-tokens.json/css |
| `scripts/validate-asset.cjs` | Validate asset naming, size, format |
| `scripts/extract-colors.cjs` | Extract and compare colors against palette |

## Templates

| Template | Purpose |
|----------|---------|
| `templates/brand-guidelines-starter.md` | Complete starter template for new brands |

## Routing

1. Parse subcommand from `$ARGUMENTS` (first word)
2. Load corresponding `references/{subcommand}.md`
3. Execute with remaining arguments
