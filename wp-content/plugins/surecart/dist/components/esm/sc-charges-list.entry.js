import { r as registerInstance, h, a as getElement } from './index-745b6bec.js';
import { a as apiFetch } from './fetch-2032d11d.js';
import { o as onFirstVisible } from './lazy-deb42890.js';
import { a as addQueryArgs } from './add-query-args-0e2a8393.js';
import './remove-query-args-938c53ea.js';

const scChargesListCss = ":host{display:block;position:relative}.charges-list{display:grid;gap:1em}";
const ScChargesListStyle0 = scChargesListCss;

const ScChargesList = class {
    constructor(hostRef) {
        registerInstance(this, hostRef);
        this.query = {
            page: 1,
            per_page: 10,
        };
        this.heading = undefined;
        this.showPagination = true;
        this.allLink = undefined;
        this.charges = [];
        this.loading = undefined;
        this.loaded = undefined;
        this.error = undefined;
        this.pagination = {
            total: 0,
            total_pages: 0,
        };
    }
    /** Only fetch if visible */
    componentWillLoad() {
        onFirstVisible(this.el, () => {
            this.getItems();
        });
    }
    /** Get items */
    async getItems() {
        try {
            this.loading = true;
            const response = (await apiFetch({
                path: addQueryArgs(`surecart/v1/charges/`, {
                    expand: ['checkout', 'checkout.order'],
                    ...this.query,
                }),
                parse: false,
            }));
            this.pagination = {
                total: parseInt(response.headers.get('X-WP-Total')),
                total_pages: parseInt(response.headers.get('X-WP-TotalPages')),
            };
            this.charges = (await response.json());
        }
        catch (e) {
            if (e === null || e === void 0 ? void 0 : e.message) {
                this.error = e.message;
            }
            else {
                this.error = wp.i18n.__('Something went wrong', 'surecart');
            }
            console.error(this.error);
        }
        finally {
            this.loading = false;
            this.loaded = true;
        }
    }
    renderRefundStatus(charge) {
        if (charge === null || charge === void 0 ? void 0 : charge.fully_refunded) {
            return h("sc-tag", { type: "danger" }, wp.i18n.__('Refunded', 'surecart'));
        }
        if (charge === null || charge === void 0 ? void 0 : charge.refunded_amount) {
            return h("sc-tag", { type: "warning" }, wp.i18n.__('Partially Refunded', 'surecart'));
        }
        return h("sc-tag", { type: "success" }, wp.i18n.__('Paid', 'surecart'));
    }
    renderEmpty() {
        return (h("sc-stacked-list-row", { "mobile-size": 0 }, h("slot", { name: "empty" }, wp.i18n.__('You have no saved payment methods.', 'surecart'))));
    }
    renderLoading() {
        return (h("sc-stacked-list-row", { style: { '--columns': '2' }, "mobile-size": 0 }, h("div", { style: { padding: '0.5em' } }, h("sc-skeleton", { style: { width: '30%', marginBottom: '0.75em' } }), h("sc-skeleton", { style: { width: '20%', marginBottom: '0.75em' } }), h("sc-skeleton", { style: { width: '40%' } }))));
    }
    renderContent() {
        var _a;
        if (this.loading && !this.loaded) {
            return this.renderLoading();
        }
        if (((_a = this.charges) === null || _a === void 0 ? void 0 : _a.length) === 0) {
            return this.renderEmpty();
        }
        return this.charges.map(charge => {
            var _a;
            const { currency, amount, created_at_date } = charge;
            return (h("sc-stacked-list-row", { style: { '--columns': '4' }, "mobile-size": 600, href: addQueryArgs(window.location.href, {
                    action: 'show',
                    model: 'order',
                    id: (_a = charge.checkout.order) === null || _a === void 0 ? void 0 : _a.id,
                }) }, h("strong", null, created_at_date), h("sc-text", { style: { '--color': 'var(--sc-color-gray-500)' } }, wp.i18n.sprintf(wp.i18n.__('#%s', 'surecart'), charge.checkout.order.number)), h("div", null, this.renderRefundStatus(charge)), h("strong", null, h("sc-format-number", { type: "currency", value: amount, currency: currency }))));
        });
    }
    nextPage() {
        this.query.page = this.query.page + 1;
        this.getItems();
    }
    prevPage() {
        this.query.page = this.query.page - 1;
        this.getItems();
    }
    render() {
        var _a;
        return (h("sc-dashboard-module", { key: '932ef18bbc6c4f2964cbc9db6f4fa1356e3a6cfe', class: "charges-list", error: this.error }, h("span", { key: 'aed23eac26eca14ae80ccf9de99838d60c5cf32f', slot: "heading" }, h("slot", { key: 'ae4b87c5404c5dd22e72a936a13ded59a83ee063', name: "heading" }, this.heading || wp.i18n.__('Payment History', 'surecart'))), !!this.allLink && (h("sc-button", { key: '14dbf0f05d5d62ecb283df0f9341daf50298531b', type: "link", href: this.allLink, slot: "end" }, wp.i18n.__('View all', 'surecart'), h("sc-icon", { key: '0e3b91393f473a2675f76fe07020e10e20865d25', name: "chevron-right", slot: "suffix" }))), h("sc-card", { key: 'bee3f25c4b04e9e873254ba872e7be776e15725e', "no-padding": true, style: { '--overflow': 'hidden' } }, h("sc-stacked-list", { key: '93d1bec458065f27d30560cc891761a97fad9d91' }, this.renderContent())), this.showPagination && (h("sc-pagination", { key: 'bf7720349c3c3a9036f3c6cbc4d224652e884c80', page: this.query.page, perPage: this.query.per_page, total: this.pagination.total, totalPages: this.pagination.total_pages, totalShowing: (_a = this === null || this === void 0 ? void 0 : this.charges) === null || _a === void 0 ? void 0 : _a.length, onScNextPage: () => this.nextPage(), onScPrevPage: () => this.prevPage() })), this.loading && this.loaded && h("sc-block-ui", { key: 'a4e0b4163265b7bf28379e2df25349864c0a0087', spinner: true })));
    }
    get el() { return getElement(this); }
};
ScChargesList.style = ScChargesListStyle0;

export { ScChargesList as sc_charges_list };

//# sourceMappingURL=sc-charges-list.entry.js.map