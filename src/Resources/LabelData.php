<?php

namespace JacobDeKeizer\Statusweb\Resources;

use JacobDeKeizer\Statusweb\Contracts\Request;

class LabelData implements Request
{
    /**
     * @var bool
     */
    private $returnLabel;

    /**
     * @var int
     */
    private $labelFormat;

    /**
     * @param bool $returnLabel
     * @return LabelData
     */
    public function setReturnLabel(bool $returnLabel): LabelData
    {
        $this->returnLabel = $returnLabel;
        return $this;
    }

    /**
     * @return bool
     */
    public function isReturnLabel(): bool
    {
        return $this->returnLabel;
    }

    /**
     * @param int $labelFormat
     * @return LabelData
     */
    public function setLabelFormat(int $labelFormat): LabelData
    {
        $this->labelFormat = $labelFormat;
        return $this;
    }

    /**
     * @return int
     */
    public function getLabelFormat(): int
    {
        return $this->labelFormat;
    }

    /**
     * @inheritDoc
     */
    public function toRequest(): array
    {
        return [
            'LabelJN' => $this->returnLabel ? 1 : 0,
            'LabelFormaat' => $this->labelFormat,
        ];
    }
}