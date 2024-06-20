import { test, expect } from '@playwright/test';

test('test', async ({ page }) => {
  await page.goto('http://127.0.0.1:8000/login');
  await page.getByLabel('Email').click();
  await page.getByRole('link', { name: 'Login' }).click();
  await page.getByRole('link', { name: 'Login' }).click();
});
