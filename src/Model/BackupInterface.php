<?php
/**
 * Created by Sileno de Oliveira Brito on 09/05/2025.
 * Copyright (c) 2025 Nerd4ever All rights reserved.
 */

namespace Nerd4ever\Common\Model;

interface BackupInterface
{
    public function entityIdentifier(): string;

    public function exportData(): array;

    public function importData(array $data): void;
}