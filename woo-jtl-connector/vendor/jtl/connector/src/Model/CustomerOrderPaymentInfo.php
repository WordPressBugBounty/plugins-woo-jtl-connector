<?php

declare(strict_types=1);

namespace Jtl\Connector\Core\Model;

use JMS\Serializer\Annotation as Serializer;

/**
 * Additional payment info for direct debit / banktransfer or payment by credit card.
 *
 * @access     public
 * @package    Jtl\Connector\Core\Model
 * @subpackage Product
 * @Serializer\AccessType("public_method")
 */
class CustomerOrderPaymentInfo extends AbstractIdentity
{
    /**
     * @var string Bank account holder name
     * @Serializer\Type("string")
     * @Serializer\SerializedName("accountHolder")
     * @Serializer\Accessor(getter="getAccountHolder",setter="setAccountHolder")
     */
    protected string $accountHolder = '';

    /**
     * @var string Bank account number (deprecated in DE since SEPA)
     * @Serializer\Type("string")
     * @Serializer\SerializedName("accountNumber")
     * @Serializer\Accessor(getter="getAccountNumber",setter="setAccountNumber")
     */
    protected string $accountNumber = '';

    /**
     * @var string Bank code (deprecated in DE since SEPA)
     * @Serializer\Type("string")
     * @Serializer\SerializedName("bankCode")
     * @Serializer\Accessor(getter="getBankCode",setter="setBankCode")
     */
    protected string $bankCode = '';

    /**
     * @var string Bank name
     * @Serializer\Type("string")
     * @Serializer\SerializedName("bankName")
     * @Serializer\Accessor(getter="getBankName",setter="setBankName")
     */
    protected string $bankName = '';

    /**
     * @var string Bank Identifier Code (BIC)
     * @Serializer\Type("string")
     * @Serializer\SerializedName("bic")
     * @Serializer\Accessor(getter="getBic",setter="setBic")
     */
    protected string $bic = '';

    /**
     * @var string Credit card expiration date
     * @Serializer\Type("string")
     * @Serializer\SerializedName("creditCardExpiration")
     * @Serializer\Accessor(getter="getCreditCardExpiration",setter="setCreditCardExpiration")
     */
    protected string $creditCardExpiration = '';

    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("creditCardHolder")
     * @Serializer\Accessor(getter="getCreditCardHolder",setter="setCreditCardHolder")
     */
    protected string $creditCardHolder = '';

    /**
     * @var string Credit card number
     * @Serializer\Type("string")
     * @Serializer\SerializedName("creditCardNumber")
     * @Serializer\Accessor(getter="getCreditCardNumber",setter="setCreditCardNumber")
     */
    protected string $creditCardNumber = '';

    /**
     * @var string Credit card type (e.g. "visa")
     * @Serializer\Type("string")
     * @Serializer\SerializedName("creditCardType")
     * @Serializer\Accessor(getter="getCreditCardType",setter="setCreditCardType")
     */
    protected string $creditCardType = '';

    /**
     * @var string Credit card verification number
     * @Serializer\Type("string")
     * @Serializer\SerializedName("creditCardVerificationNumber")
     * @Serializer\Accessor(getter="getCreditCardVerificationNumber",setter="setCreditCardVerificationNumber")
     */
    protected string $creditCardVerificationNumber = '';

    /**
     * @var string International Bank Account Number (IBAN)
     * @Serializer\Type("string")
     * @Serializer\SerializedName("iban")
     * @Serializer\Accessor(getter="getIban",setter="setIban")
     */
    protected string $iban = '';

    /**
     * @return string Bank account holder name
     */
    public function getAccountHolder(): string
    {
        return $this->accountHolder;
    }

    /**
     * @param string $accountHolder Bank account holder name
     *
     * @return CustomerOrderPaymentInfo
     */
    public function setAccountHolder(string $accountHolder): CustomerOrderPaymentInfo
    {
        $this->accountHolder = $accountHolder;

        return $this;
    }

    /**
     * @return string Bank account number (deprecated in DE since SEPA)
     */
    public function getAccountNumber(): string
    {
        return $this->accountNumber;
    }

    /**
     * @param string $accountNumber Bank account number (deprecated in DE since SEPA)
     *
     * @return CustomerOrderPaymentInfo
     */
    public function setAccountNumber(string $accountNumber): CustomerOrderPaymentInfo
    {
        $this->accountNumber = $accountNumber;

        return $this;
    }

    /**
     * @return string Bank code (deprecated in DE since SEPA)
     */
    public function getBankCode(): string
    {
        return $this->bankCode;
    }

    /**
     * @param string $bankCode Bank code (deprecated in DE since SEPA)
     *
     * @return CustomerOrderPaymentInfo
     */
    public function setBankCode(string $bankCode): CustomerOrderPaymentInfo
    {
        $this->bankCode = $bankCode;

        return $this;
    }

    /**
     * @return string Bank name
     */
    public function getBankName(): string
    {
        return $this->bankName;
    }

    /**
     * @param string $bankName Bank name
     *
     * @return CustomerOrderPaymentInfo
     */
    public function setBankName(string $bankName): CustomerOrderPaymentInfo
    {
        $this->bankName = $bankName;

        return $this;
    }

    /**
     * @return string Bank Identifier Code (BIC)
     */
    public function getBic(): string
    {
        return $this->bic;
    }

    /**
     * @param string $bic Bank Identifier Code (BIC)
     *
     * @return CustomerOrderPaymentInfo
     */
    public function setBic(string $bic): CustomerOrderPaymentInfo
    {
        $this->bic = $bic;

        return $this;
    }

    /**
     * @return string Credit card expiration date
     */
    public function getCreditCardExpiration(): string
    {
        return $this->creditCardExpiration;
    }

    /**
     * @param string $creditCardExpiration Credit card expiration date
     *
     * @return CustomerOrderPaymentInfo
     */
    public function setCreditCardExpiration(string $creditCardExpiration): CustomerOrderPaymentInfo
    {
        $this->creditCardExpiration = $creditCardExpiration;

        return $this;
    }

    /**
     * @return string
     */
    public function getCreditCardHolder(): string
    {
        return $this->creditCardHolder;
    }

    /**
     * @param string $creditCardHolder
     *
     * @return CustomerOrderPaymentInfo
     */
    public function setCreditCardHolder(string $creditCardHolder): CustomerOrderPaymentInfo
    {
        $this->creditCardHolder = $creditCardHolder;

        return $this;
    }

    /**
     * @return string Credit card number
     */
    public function getCreditCardNumber(): string
    {
        return $this->creditCardNumber;
    }

    /**
     * @param string $creditCardNumber Credit card number
     *
     * @return CustomerOrderPaymentInfo
     */
    public function setCreditCardNumber(string $creditCardNumber): CustomerOrderPaymentInfo
    {
        $this->creditCardNumber = $creditCardNumber;

        return $this;
    }

    /**
     * @return string Credit card type (e.g. "visa")
     */
    public function getCreditCardType(): string
    {
        return $this->creditCardType;
    }

    /**
     * @param string $creditCardType Credit card type (e.g. "visa")
     *
     * @return CustomerOrderPaymentInfo
     */
    public function setCreditCardType(string $creditCardType): CustomerOrderPaymentInfo
    {
        $this->creditCardType = $creditCardType;

        return $this;
    }

    /**
     * @return string Credit card verification number
     */
    public function getCreditCardVerificationNumber(): string
    {
        return $this->creditCardVerificationNumber;
    }

    /**
     * @param string $creditCardVerificationNumber Credit card verification number
     *
     * @return CustomerOrderPaymentInfo
     */
    public function setCreditCardVerificationNumber(string $creditCardVerificationNumber): CustomerOrderPaymentInfo
    {
        $this->creditCardVerificationNumber = $creditCardVerificationNumber;

        return $this;
    }

    /**
     * @return string International Bank Account Number (IBAN)
     */
    public function getIban(): string
    {
        return $this->iban;
    }

    /**
     * @param string $iban International Bank Account Number (IBAN)
     *
     * @return CustomerOrderPaymentInfo
     */
    public function setIban(string $iban): CustomerOrderPaymentInfo
    {
        $this->iban = $iban;

        return $this;
    }
}
