# Project Requirements

## Project name & domain
- Project name: Adorsholipi
- Domain: adorsholipi.online
- Notes: The domain and project are based on the primary old book "adorsholipi" — the site will collect memories from that era of primary education.

## Overview
This project has two parts: frontend and backend. Public content is visible on the frontend site. Authentication rules differ per part: backend is for admin only, frontend is for contributors (via registration).

Purpose
This site will collect memories from primary education — books, rhymes, poems, and other material not available in the current curriculum. Public visitors can browse collected items; contributors register to submit memories; admins review and approve submissions from the backend.

## Functional Requirements
- Frontend
  - Server-rendered pages using Blade templates (Laravel or similar) with plain HTML, CSS, JavaScript and jQuery. No frontend frameworks (React/Vue/etc.) required.
  - Public pages that display published public content without authentication.
  - Contributor registration and login (self-registration).
  - Contributors can create and submit content (text, images, attachments, metadata).
  - Submitted content is saved as "pending" and is not visible publicly until approved by an admin.
  - Contributors can view submission status and receive feedback/messages from admin.
  - Contributors can perform CRUD on their own submissions (create, read, update, delete). Contributors must not modify or delete other users' content. Deletions should be soft-delete or require admin confirmation per policy.
- Backend
  - Admin-only login (no public/admin registration from frontend).
  - Admin panel/API for reviewing pending submissions: approve, reject, request changes, edit, or publish.
  - Admin actions change content status (pending → approved/published or rejected) and optionally notify contributor.
  - Audit log of moderation actions.

## Authentication & Authorization
- Two main roles: Admin, Contributor.
- Backend accepts only Admin accounts for login and site management.
- Frontend allows Contributor registration and login.
- Public endpoints require no authentication.
- Use secure authentication (e.g., JWT or session cookies) and role-based access control on all protected endpoints.
- Enforce ownership checks on contributor endpoints so users can only access and modify their own content.

## API & Data
- Content model includes status field (draft, pending, approved/published, rejected), contributor reference, timestamps, and moderation notes.
- Public read endpoints return only approved/published content.
- Contributor endpoints to create/submit content, view status, edit unapproved items, and delete their own items (soft-delete recommended).
- Admin endpoints for moderation actions and site management.
- Validation, input sanitization, and proper error handling for all endpoints.

## Notifications & UX
- Notify contributors when submissions are approved, rejected, or require changes (email/in-app).
- Contributor dashboard to track submissions and moderator feedback.
- Moderation queue and filters for admin (by status, date, contributor, type).

## Security & Compliance
- Store passwords securely (bcrypt/argon2).
- Enforce HTTPS in production.
- Protect against common web vulnerabilities (XSS, CSRF, SQL injection).

## Notes / Next steps
- Define contributor permissions (explicit CRUD ownership rules, soft-delete policy). yes.
- Decide tech stack and authentication mechanism for backend (Laravel recommended if using Blade). On the frontend use blade and html with JQuery and Javascript no need to use frameworks
- Design moderation workflow UI and API contract (routes, payloads, response formats). use standard format
- Implement notifications and audit logging. yes