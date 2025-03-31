const functions = require('firebase-functions');
const admin = require('firebase-admin');
const sgMail = require('@sendgrid/mail');

// Initialize Firebase Admin SDK
admin.initializeApp();

// Set your SendGrid API key here
sgMail.setApiKey('YOUR_SENDGRID_API_KEY');

exports.sendMassEmail = functions.https.onRequest(async (req, res) => {
    try {
        const snapshot = await admin.firestore().collection('users').get();
        const emails = [];

        snapshot.forEach(doc => {
            const data = doc.data();
            if (data.email) {
                emails.push(data.email);
            }
        });

        const msg = {
            to: emails, // List of emails
            from: 'your-email@example.com', // Your email address
            subject: 'Welcome to Curation1',
            text: 'Thanks for signing up! You will receive updates soon.',
            html: '<strong>Thanks for signing up! You will receive updates soon.</strong>',
        };

        await sgMail.send(msg);
        res.status(200).send('Emails sent successfully!');
    } catch (error) {
        console.error(error);
        res.status(500).send('Failed to send emails');
    }
});
