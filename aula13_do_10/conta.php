<?php

class Conta {
    private float $saldo;

    public function __construct(float $saldoInicial = 0.0) {
        if ($saldoInicial < 0) {
            throw new InvalidArgumentException("O saldo inicial não pode ser negativo.");
        }
        $this->saldo = $saldoInicial;
    }

    public function getSaldo(): float {
        return $this->saldo;
    }

    public function depositar(float $valor): void {
        if ($valor <= 0) {
            throw new InvalidArgumentException("O valor do depósito deve ser positivo.");
        }
        $this->saldo += $valor;
    }

    public function sacar(float $valor): void {
        if ($valor <= 0) {
            throw new InvalidArgumentException("O valor do saque deve ser positivo.");
        }
        if ($valor > $this->saldo) {
            throw new Exception("Saldo insuficiente.");
        }
        $this->saldo -= $valor;
    }
}