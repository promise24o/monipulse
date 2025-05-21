# MoniPulse - VTU SaaS Platform for Nigeria 🇳🇬

**MoniPulse** is a SaaS-based Virtual Top-Up (VTU) solution that empowers Nigerians—students, resellers, and small business owners—to launch and run their own airtime, data, and bill payment businesses with ease.

> **Live Example**: [https://monipulse.com](https://monipulse.com)  
> **Demo Storefront**: [https://giftdata.monipulse.com](https://giftdata.monipulse.com)

---

## 🚀 Features

### 🎯 For VTU Resellers
- Branded VTU storefront via **subdomain** or **unique link**
- Sell data, airtime, electricity, cable TV, and more
- Add your **own VTU API keys** (Data24, Jonet, etc.)
- Set custom pricing & margins
- Wallet system for transactions
- Simple dashboard to track earnings and activity

### 🧰 For SaaS Admin
- Multi-tenant management system
- Admin panel to manage users, APIs, and service logs
- Approve/ban accounts
- View and control wallet funding and commission structure
- Manage global service rates and availability

---

## ⚙️ Tech Stack

| Layer        | Stack                     |
|--------------|---------------------------|
| Frontend     | HTML, TailwindCSS, Vue 3 / React |
| Backend      | PHP (CodeIgniter 4 / Laravel) or Node.js |
| Database     | MySQL / PostgreSQL        |
| Auth         | Session or JWT            |
| Payments     | Paystack, Monnify, Flutterwave |
| Deployment   | cPanel, CloudLinux, or VPS |
| Domain       | Wildcard DNS + CNAME support |

---

## 📦 Getting Started (Self-hosted Installation)

> For SaaS users, simply sign up at [monipulse.com](https://monipulse.com).  
> For script buyers or resellers:

### Requirements
- PHP 8.x or Node.js 18+
- MySQL 5.7+/PostgreSQL
- cPanel or VPS access
- Wildcard subdomain DNS (`*.yourdomain.com`)

### Installation Steps

1. Clone or upload the source code to your hosting
2. Create a new database and import `monipulse.sql`
3. Configure `.env` or `/app/config` with DB and email details
4. Set up wildcard subdomain on your hosting panel
5. Visit `/install` to complete setup (if auto-installer exists)
6. Log into admin panel → configure platform settings

---

## 🧪 API Integration

You can plug in any VTU service provider:
- Jonet
- Data24
- VTPass
- Datalink
- Others with RESTful APIs

Each user enters their API key to connect services to their own panel.

---

## 💼 Monetization Model

- **Monthly Subscription** for premium users
- **Commission per transaction** (Admin-controlled)
- **Custom Branding** upsell (CNAME or domain mapping)
- **SMS Alerts**, **Bulk Reseller Module**, and **KYC Verification** (optional)

---

## 📄 License

MoniPulse is a **commercial product**. Reselling, redistribution, or modification without a valid license is prohibited.

- SaaS owners require a valid master license.
- Self-hosted script buyers must activate using a purchase email and API key.

---

## 📧 Support & Contact

- Email: `support@monipulse.com`
- Website: [https://monipulse.com](https://monipulse.com)
- Twitter: `@monipulseapp` *(optional)*

---

## 🙌 Contributing

We’re currently not accepting public contributions. Please email for partnership or private beta testing.

---

**Built to empower Nigerians with simple, powerful VTU tools.** 🇳🇬💡
