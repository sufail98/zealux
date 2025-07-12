<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Frontpage');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Frontpage::index');
$routes->get('admin', 'Frontpage::SuperAdmin');

$routes->post('login', 'Frontpage::AdminLogin');
$routes->post('app-login', 'Frontpage::login');
$routes->get('stores', 'Frontpage::Stores');

$routes->get('logout', 'Frontpage::AdminLogout');
$routes->get('dashboard', 'Frontpage::Dashboard');

$routes->get('feature', 'Features::index');
$routes->post('save-feature', 'Features::SaveFeature');
$routes->get('edit-feature/(:num)', 'Features::featureEdit/$1');
$routes->post('update-feature', 'Features::UpdateFeature');
$routes->get('delete-feature/(:num)', 'Features::FeatureDelete/$1');

$routes->get('groups', 'Groups::index');
$routes->get('get-group', 'Groups::getGroupDetails');
$routes->post('save-group', 'Groups::SaveGroup');
$routes->post('update-group', 'Groups::UpdateGroup');
$routes->get('delete-group/(:num)', 'Groups::GroupDelete/$1');

$routes->get('lens', 'Lens::index');
$routes->get('get-lens', 'Lens::getLensDetails');
$routes->post('save-lens', 'Lens::SaveLens');
$routes->post('update-lens', 'Lens::UpdateLens');
$routes->get('delete-lens/(:num)', 'Lens::LensDelete/$1');

$routes->get('lens-feature', 'LensFeatures::index');
$routes->post('save-lens-feature', 'LensFeatures::SaveLensFeature');
$routes->get('edit-lens-feature/(:num)', 'LensFeatures::LensfeatureEdit/$1');
$routes->post('update-lens-feature', 'LensFeatures::UpdateLensFeature');
$routes->get('delete-lens-feature/(:num)', 'LensFeatures::LensFeatureDelete/$1');

$routes->get('size', 'Size::index');
$routes->get('get-size', 'Size::getSizeDetails');
$routes->post('save-size', 'Size::SaveSize');
$routes->post('update-size', 'Size::UpdateSize');
$routes->get('delete-size/(:num)', 'Size::SizeDelete/$1');

$routes->get('products', 'Product::Products');
$routes->get('add-product', 'Product::AddProduct');
$routes->post('save-product', 'Product::SaveProduct');
$routes->get('edit-product/(:num)', 'Product::ProductEdit/$1');
$routes->post('update-product', 'Product::UpdateProduct');
$routes->get('delete-product/(:num)', 'Product::ProductDelete/$1');

$routes->get('lens-creation', 'LensCreation::index');
$routes->get('add-lens-creation', 'LensCreation::LensCreations');
$routes->post('save-lens-creation', 'LensCreation::SaveLens');
$routes->get('edit-lens-creation/(:num)', 'LensCreation::LensEdit/$1');
$routes->post('update-lens-creation', 'LensCreation::UpdateLens');
$routes->get('delete-lens-creation/(:num)', 'LensCreation::LensDelete/$1');

$routes->get('eye-test', 'EyeTest::index');
$routes->post('get-eye-test-by-date', 'EyeTest::getEyetestByDate');
$routes->get('add-eye-test/(:num)', 'EyeTest::eyeTests/$1');
$routes->post('save-eye-test', 'EyeTest::SaveEyeTest');
$routes->get('edit-eye-test/(:num)', 'EyeTest::EyeTestEdit/$1');
$routes->post('update-eye-test', 'EyeTest::UpdateEyeTest');
$routes->get('delete-eye-test/(:num)', 'EyeTest::EyeTestDelete/$1');

$routes->get('customer-registration', 'EyeTest::CustomerReg');
$routes->post('save-customer', 'EyeTest::SaveCustomer');
$routes->get('customers', 'EyeTest::Customers');
$routes->get('customers-list', 'EyeTest::CustomersList');
$routes->get('edit-customer/(:num)', 'EyeTest::CustomerEdit/$1');
$routes->post('update-customer', 'EyeTest::UpdateCustomer');
$routes->get('delete-customer/(:num)', 'EyeTest::CustomerDelete/$1');


$routes->get('sales', 'Sales::index');
$routes->get('get-sales-data-by-barcode', 'Sales::getSalesDataByBarcode');
$routes->get('get-all-products', 'Sales::get_all_products');
$routes->get('get-product-details/(:num)', 'Sales::get_product_details/$1');
$routes->get('get-eyetest-details', 'Sales::GetEyetestDetails');
$routes->get('get-coupencode', 'Sales::GetCoupon');
$routes->get('get-lenses/(:num)', 'Sales::GetLenses/$1');
$routes->get('get-eyetest-user', 'Sales::getEyeDetails');
$routes->get('get-delivery-days', 'Sales::GetDeliveryDays');
$routes->get('get-previlage-user/(:num)', 'Sales::GetPrevilageUser/$1');
$routes->post('save-cart-data', 'Sales::SaveCartData');
$routes->get('sales-report', 'Sales::SalesReport');
$routes->post('get-sales-report-by-date', 'Sales::getSalesReportByDate');
$routes->get('deleted-sales-report', 'Sales::DeletedSalesReport');
$routes->post('get-deleted-sales-report-by-date', 'Sales::getDeletedSalesReportByDate');
$routes->get('invoice-print/(:num)', 'Sales::invoicePrint/$1');
$routes->get('invoice-whatsapp/(:num)', 'Sales::invoiceWhatsapp/$1');
$routes->get('invoice-view/(:num)', 'Sales::invoiceView/$1');
$routes->post('save-delivered', 'Sales::SaveInvoiceReceipt');
$routes->get('delete-invoice/(:num)', 'Sales::InvoiceDelete/$1');
$routes->get('invoice-mail', 'Sales::invoiceMail');
$routes->get('daily-collection-report', 'Sales::DailyCollectionReport');
$routes->post('get-daily-report-by-date', 'Sales::getDailyReportByDate');
$routes->get('bill-wise-profit-report', 'Sales::BillWiseProfitReport');
$routes->post('billwise-profit-report-by-date', 'Sales::BillWiseProfitReportByDate');
$routes->get('account-summary-report', 'Sales::AccountSummaryReport');
$routes->post('account-summary-report-by-date', 'Sales::AccountSummaryReportByDate');
$routes->get('get-total-purchase-count', 'Sales::getTotalPurchaseCount');
$routes->get('sales-return', 'Sales::SalesReturn');
$routes->post('get-sales-return-by-filter', 'Sales::getSalesReturnByFilter');
$routes->get('return-view/(:num)', 'Sales::ReturnView/$1');
$routes->post('save-return-data', 'Sales::SaveReturnData');
$routes->get('get-sales-returns', 'Sales::getSalesReturns');
$routes->get('get-frame-warranty', 'Sales::getFrameWarranty');
$routes->get('get-frame-purchase-date', 'Sales::getFramePurchaseDate');
$routes->get('get-lens-warranty', 'Sales::getLensWarranty');
$routes->get('get-color-wise-stock', 'Sales::getColorWiseStock');
$routes->get('stock-report', 'Sales::StockReport');
$routes->post('get-stock-report-by-filter', 'Sales::getStockReport');
$routes->post('get-eyetest-users', 'Sales::getEyetestUsers');
$routes->get('get-lens-cleaner-details', 'Sales::getLensCleanerDetails');
$routes->get('get-coating-details', 'Sales::GetCoatingDetails');
$routes->get('customer-review-report', 'Sales::CustomerReviewReport');
$routes->post('get-customer-review-report-by-date', 'Sales::CustomerReviewReportByDate');
$routes->post('save-medicalrecord', 'Sales::SaveMedicalRecord');


$routes->get('lens-coating', 'LensCoating::index');
$routes->get('add-lens-coating', 'LensCoating::LensCoatings');
$routes->post('save-lens-coating', 'LensCoating::SaveCoating');
$routes->get('edit-lens-coating/(:num)', 'LensCoating::CoatingEdit/$1');
$routes->post('update-lens-coating', 'LensCoating::UpdateCoating');
$routes->get('delete-lens-coating/(:num)', 'LensCoating::CoatingDelete/$1');

$routes->get('previlage-cards', 'PrevilageCard::index');
$routes->get('get-previlage', 'PrevilageCard::getPrevilageDetails');
$routes->post('save-previlage', 'PrevilageCard::SavePrevilage');
$routes->post('update-previlage', 'PrevilageCard::UpdatePrevilage');
$routes->get('delete-previlage/(:num)', 'PrevilageCard::PrevilageDelete/$1');
$routes->post('save-previlage-data', 'PrevilageCard::SavePrevilageData');
$routes->post('get-previlage-users', 'PrevilageCard::getPrevilageUsers');

$routes->get('previlage-card-types', 'PrevilageCard::PrevilageCardTypes');
$routes->get('get-previlage-types', 'PrevilageCard::getPrevilageTypeDetails');
$routes->post('save-previlage-type', 'PrevilageCard::SavePrevilageType');
$routes->post('update-previlage-type', 'PrevilageCard::UpdatePrevilageType');
$routes->get('delete-previlage-type/(:num)', 'PrevilageCard::PrevilageTypeDelete/$1');

$routes->get('salesman', 'Salesman::index');
$routes->get('get-salesman', 'Salesman::getSalesmanDetails');
$routes->post('save-salesman', 'Salesman::SaveSalesman');
$routes->post('update-salesman', 'Salesman::UpdateSalesman');
$routes->get('delete-salesman/(:num)', 'Salesman::SalesmanDelete/$1');

$routes->get('coupencode', 'CoupenCode::index');
$routes->get('get-coupen-code', 'CoupenCode::getCoupenCodeDetails');
$routes->post('save-coupencode', 'CoupenCode::SaveCoupenCode');
$routes->post('update-coupencode', 'CoupenCode::UpdateCoupenCode');
$routes->get('delete-coupencode/(:num)', 'CoupenCode::CoupenCodeDelete/$1');

$routes->get('users', 'User::Users');
$routes->get('add-user', 'User::AddUser');
$routes->post('save-user', 'User::SaveUser');
$routes->get('edit-user/(:num)', 'User::UserEdit/$1');
$routes->post('update-user', 'User::UpdateUser');
$routes->get('delete-user/(:num)', 'User::UserDelete/$1');
$routes->post('check-username', 'User::checkUsername');

$routes->get('breakage-warranty', 'BreakageWarranty::index');
$routes->get('add-breakage-warranty', 'BreakageWarranty::BreakageWarrantyForm');
$routes->post('save-breakage-warranty', 'BreakageWarranty::SaveBreakageWarranty');
$routes->get('edit-breakage-warranty/(:num)', 'BreakageWarranty::BreakageWarrantyEdit/$1');
$routes->post('update-breakage-warranty', 'BreakageWarranty::UpdateBreakageWarranty');
$routes->get('delete-breakage-warranty/(:num)', 'BreakageWarranty::BreakageWarrantyDelete/$1');
$routes->get('get-breakage-warranty', 'BreakageWarranty::getBreakageWarranty');
$routes->post('get-warranty-rate', 'BreakageWarranty::getWarrantyRate');

$routes->get('upi-details', 'Settings::index');
$routes->post('update-upi', 'Settings::UpdateUpi');
$routes->get('get-upi-details', 'Settings::GetUpiDetailsData');

$routes->get('purchase', 'Purchase::index');
$routes->post('get-colors', 'Purchase::GetColors');
$routes->post('save-purchase', 'Purchase::SavePurchase');
$routes->get('purchase-list', 'Purchase::PurchaseList');
$routes->post('get-purchase-report-by-date', 'Purchase::getPurchaseReportByDate');
$routes->get('edit-purchase/(:num)', 'Purchase::EditPurchase/$1');
$routes->post('update-purchase', 'Purchase::UpdatePurchase');
$routes->get('delete-purchase/(:num)', 'Purchase::DeletePurchase/$1');

$routes->get('stock-transfer', 'StockTransfer::index');
$routes->post('stock-tranfer-colors', 'StockTransfer::GetColors');
$routes->post('save-stock-transfer', 'StockTransfer::SaveStockTransfer');
$routes->get('stock-transfer-list', 'StockTransfer::StockTransferList');
$routes->post('get-transfer-report-by-date', 'StockTransfer::getTransferReportByDate');
$routes->get('edit-transfer/(:num)', 'StockTransfer::EditStockTransfer/$1');
$routes->post('update-stock-tranfer', 'StockTransfer::UpdateStockTransfer');
$routes->get('delete-transfer/(:num)', 'StockTransfer::DeleteStockTransfer/$1');

$routes->get('questions', 'ReviewQuestions::index');
$routes->get('add-questions', 'ReviewQuestions::QuestionsAdd');
$routes->post('save-questions', 'ReviewQuestions::SaveQuestions');
$routes->get('edit-question/(:num)', 'ReviewQuestions::EditQuestions/$1');
$routes->post('update-questions', 'ReviewQuestions::UpdateQuestions');
$routes->get('delete-question/(:num)', 'ReviewQuestions::DeleteQuestions/$1');
$routes->get('customer-review', 'ReviewQuestions::CustomerReview');
$routes->post('save-review', 'ReviewQuestions::SaveReviews');
$routes->get('saved-reviews', 'ReviewQuestions::SavedReviews');
$routes->post('get-saved-review-report-by-date', 'ReviewQuestions::SavedReviewsReportByDate');
$routes->get('view-review/(:num)', 'ReviewQuestions::ViewReview/$1');
$routes->get('delete-review/(:num)', 'ReviewQuestions::DeleteReview/$1');
$routes->get('salesman-review-report', 'ReviewQuestions::SalesmanReviewReport');
$routes->post('get-salesman-review-report-by-date', 'ReviewQuestions::SalesmanReviewReportByDate');


$routes->get('checklists', 'CheckList::index');
$routes->get('add-checklist', 'CheckList::CheckListAdd');
$routes->post('save-checklist', 'CheckList::SaveCheckList');
$routes->get('edit-checklist/(:num)', 'CheckList::EditCheckList/$1');
$routes->post('update-checklist', 'CheckList::UpdateCheckList');
$routes->get('delete-checklist/(:num)', 'CheckList::DeleteCheckList/$1');
$routes->get('checklist-form', 'CheckList::ChecklistForm');
$routes->get('get-checklist-questions', 'CheckList::getChecklistQuestions');
$routes->post('insert-checklist', 'CheckList::InsertCheckLists');
$routes->get('checklist-report', 'CheckList::ChecklistReport');
$routes->post('get-checklist-report-by-date', 'CheckList::ChecklistReportByDate');
$routes->get('view-checklist/(:num)', 'CheckList::ViewCheckList/$1');
$routes->get('checklists-delete/(:num)', 'CheckList::checklistsDelete/$1');


/*`
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
