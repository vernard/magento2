<?php
/**
 * Magento
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Open Software License (OSL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/osl-3.0.php
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@magentocommerce.com so we can send you a copy immediately.
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade Magento to newer
 * versions in the future. If you wish to customize Magento for your
 * needs please refer to http://www.magentocommerce.com for more information.
 *
 * @copyright   Copyright (c) 2014 X.commerce, Inc. (http://www.magentocommerce.com)
 * @license     http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */
namespace Magento\Sales\Service\V1\Action;

use Magento\Sales\Model\Order\InvoiceRepository;
use Magento\Sales\Service\V1\Data\InvoiceMapper;

/**
 * Class InvoiceGet
 */
class InvoiceGet
{
    /**
     * @var InvoiceRepository
     */
    protected $invoiceRepository;

    /**
     * @var InvoiceMapper
     */
    protected $invoiceMapper;

    /**
     * @param InvoiceRepository $invoiceRepository
     * @param InvoiceMapper $invoiceMapper
     */
    public function __construct(
        InvoiceRepository $invoiceRepository,
        InvoiceMapper $invoiceMapper
    ) {
        $this->invoiceRepository = $invoiceRepository;
        $this->invoiceMapper = $invoiceMapper;
    }

    /**
     * Invoke getInvoice service
     *
     * @param int $id
     * @return \Magento\Sales\Service\V1\Data\Invoice
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     */
    public function invoke($id)
    {
        return $this->invoiceMapper->extractDto($this->invoiceRepository->get($id));
    }
}
