import { test, expect } from '@playwright/test';

test.describe('User Registration Process', () => {
    test('Navigate to registration page', async ({ page }) => {
        await page.goto('http://127.0.0.1:8000/login');
        await page.getByRole('link', { name: 'Don\'t have an account? Register here' }).click();
    });

    test('Validate empty name field', async ({ page }) => {
        await page.goto('http://127.0.0.1:8000/user-account/create');

        await page.getByLabel('Your Name').click();
        await page.getByLabel('Your Name').fill('');

        await page.getByLabel('Your Name').press('Enter');
        await expect(page.getByText('The name field is required.')).toBeVisible();
    });

    test('Email field validation', async ({ page }) => {
        await page.goto('http://127.0.0.1:8000/user-account/create');

        await page.getByLabel('Email').click();
        await page.getByLabel('Email').fill('test@example.com');

        await page.getByLabel('Email').press('Enter');
        await expect(page.getByText('The email has already been taken.')).toBeVisible();
    });

    test('Password field validation', async ({ page }) => {
        await page.goto('http://127.0.0.1:8000/user-account/create');

        await page.getByLabel('Password', { exact: true }).click();
        await page.getByLabel('Password', { exact: true }).fill('1234');

        await page.getByLabel('Password', { exact: true }).press('Enter');
        await page.getByText('The password field must be at least 8 characters.').click();
    });

    test('Should show error when passwords do not match', async ({ page }) => {
        await page.goto('http://127.0.0.1:8000/user-account/create');

        await page.getByLabel('Password', { exact: true }).click();
        await page.getByLabel('Password', { exact: true }).fill('P@ssw0rd_1KL');

        await page.getByLabel('Confirm Password').click();
        await page.getByLabel('Confirm Password').fill('P@ssw0rd_MISMATCH');

        await page.getByLabel('Confirm Password').press('Enter');
        await page.getByText('The password field confirmation does not match.').click();
    });



    test('Create account action', async ({ page }) => {
        await page.goto('http://127.0.0.1:8000/user-account/create');
        await page.getByLabel('Your Name').fill('Mr Tester');
        await page.getByLabel('Email').fill('mr.tester@example.com');
        await page.getByLabel('Password', { exact: true }).click();
        await page.getByLabel('Password', { exact: true }).fill('P@ssw0rd_1KL');
        await page.getByLabel('Confirm Password').click();
        await page.getByLabel('Confirm Password').fill('P@ssw0rd_1KL');
        await page.getByRole('button', { name: 'Create Account' }).click();

        // Wait for navigation to the listing page
        await page.waitForNavigation({ url: 'http://127.0.0.1:8000/listing' });

        // Wait for the success message to appear on the listing page
        await page.locator('text=Welcome Mr Tester, your account has been created successfully!').waitFor();

        // Check if the success message is displayed
        const successMessage = await page.locator('text=Welcome Mr Tester, your account has been created successfully!').textContent();
        expect(successMessage).toBe('Welcome Mr Tester, your account has been created successfully!');
    });
});
