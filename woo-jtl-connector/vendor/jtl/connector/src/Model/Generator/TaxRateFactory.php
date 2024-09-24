<?php

declare(strict_types=1);

namespace Jtl\Connector\Core\Model\Generator;

use Jtl\Connector\Core\Model\TaxRate;
use Jtl\Connector\Core\Utilities\Validator\Validate;
use RuntimeException;

class TaxRateFactory extends AbstractModelFactory
{
    /** @var array<int, string> */
    protected array $usedCountries = [];

    /**
     * @return array<string, string|float>
     * @throws RuntimeException|\TypeError
     */
    protected function makeFakeArray(): array
    {
        return [
            'countryIso' => $this->getUnusedCountryIso(),
            'rate'       => Validate::checkGeneratorAndNotNull($this->faker)->randomFloat(2, 0, 30),
        ];
    }

    /**
     * @return string
     * @throws \RuntimeException|\TypeError
     */
    protected function getUnusedCountryIso(): string
    {
        if (\count($this->usedCountries) >= 247) {
            $this->clearUsedCountries();
        }

        for ($count = 0; $count <= 1000; $count++) {
            $countryIso = Validate::checkGeneratorAndNotNull($this->faker)->countryCode;
            if (!\in_array($countryIso, $this->usedCountries, true)) {
                $this->usedCountries[] = $countryIso;
                return $countryIso;
            }
        }

        throw new \RuntimeException('loop-limit exceeded.');
    }

    public function clearUsedCountries(): void
    {
        $this->usedCountries = [];
    }

    /**
     * @return string
     */
    protected function getModelClass(): string
    {
        return TaxRate::class;
    }
}
